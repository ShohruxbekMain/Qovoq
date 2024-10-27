<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       28.09.2024
 * Time:       7:26
 */

namespace app\core;

/**
 * Class       Model
 *
 * @author     Shohrux
 * @package    app\core
 */
abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public const RULE_LOWERCASE = 'lowercase';
    public const RULE_CAPITAL = 'capital';
    public const RULE_NUMBER = 'number';
    public const RULE_SPECIAL = 'special';
    public const RULE_ALPHA = 'alpha';
    public const RULE_NUMERIC = 'numeric';
    public const RULE_ALPHA_NUMERIC = 'alpha_numeric';
    public const RULE_ALPHA_CHARACTERS = 'alpha_characters';
    public const RULE_ALPHA_NUMERIC_CHARACTERS = 'alpha_numeric_characters';
    public const RULE_TERMS = 'termsAccepted';
//    public bool $termsAccepted = false;
    public array $errors = [];
    public array $success = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {

//                if ($key === 'termsAccepted') {
//                    // Checkbox belgilangan bo'lsa, true bo'lishi kerak
//                    $this->termsAccepted = isset($data['termsAccepted']) && $data['termsAccepted'] === '1';
//                } else {
//                    $this->{$key} = $value; // Boshqa maydonlar uchun
//                }

                if (is_bool($this->{$key})) {
                    $this->{$key} = isset($value);
                } else {
                    $this->{$key} = $value;
                }
            }
        }
    }

    abstract public function rules(): array;

    public function labels(): array
    {
        return [];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }

    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            if (!is_array($rules)) {
                continue; // Agar qoidalar massiv bo'lmasa, davom eting
            }
            $value = $this->{$attribute};

            $isSuccess = true; // Success bayrog'i | use: (off)

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
//                    $this->addError($attribute, "{$attribute} is required.");
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_TERMS && !$value) {
                    $this->addErrorForRule($attribute, self::RULE_TERMS);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, self::RULE_EMAIL);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
//                    $this->addError($attribute, self::RULE_MIN, ['min' => $rule['min']]);
                    $this->addErrorForRule($attribute, self::RULE_MIN, $rule);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorForRule($attribute, self::RULE_MAX, $rule);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $rule['match'] = $this->getLabel($rule['match']);
                    $this->addErrorForRule($attribute, self::RULE_MATCH, $rule);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                // RULE_LOWERCASE (kichik harflar kerak)
                if ($ruleName === self::RULE_LOWERCASE && !preg_match('/[a-z]/', $value)) {
                    $this->addErrorForRule($attribute, self::RULE_LOWERCASE);
                    $isSuccess = false;
                }
                // RULE_CAPITAL (katta harflar kerak)
                if ($ruleName === self::RULE_CAPITAL && !preg_match('/[A-Z]/', $value)) {
                    $this->addErrorForRule($attribute, self::RULE_CAPITAL);
                    $isSuccess = false;
                }
                // RULE_NUMBER (raqam kerak)
                if ($ruleName === self::RULE_NUMBER && !preg_match('/\d/', $value)) {
                    $this->addErrorForRule($attribute, self::RULE_NUMBER);
                    $isSuccess = false;
                }
                // RULE_SPECIAL (maxsus belgi kerak)
                if ($ruleName === self::RULE_SPECIAL && !preg_match('/[!@#$%^&*]/', $value)) {
                    $this->addErrorForRule($attribute, self::RULE_SPECIAL);
                    $isSuccess = false;
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $sql = "SELECT * FROM $tableName WHERE $uniqueAttr = :attr";
                    $statement = Application::$app->db->prepare($sql);
                    $statement->bindValue(":attr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        // CHATGPT yordam berdi
                        $this->addErrorForRule($attribute, self::RULE_UNIQUE, ['field' => $this->getLabel($attribute)]);
                    }
                }
            }
            // Agar hech qanday xato bo'lmasa, successni qo'shamiz
            if ($isSuccess) {
                $this->addSuccess($attribute, 'Success');
            }

        }

        return empty($this->errors);
    }

    private function addErrorForRule(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';

        // Haqiqiy atribut nomini olish
        if (!empty($params['field'])) {
            // Agar 'field' parametr berilgan bo'lsa, xato xabarida almashtirish
            $message = str_replace('{field}', $params['field'], $message);
        } else {
            // Aks holda, haqiqiy atribut nomini olish
            $params['field'] = $this->getLabel($attribute); // Atribut nomini olish
            $message = str_replace('{field}', $params['field'], $message); // Xato xabarida almashtirish
        }


        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function addError(string $attribute, string $message)
    {
        $this->errors[$attribute][] = $message;
    }

    public function addErrorMessageAJAX(string $attribute, string $rule, array $params = [])
    {
        // Xato xabarini olish
        $message = $this->errorMessages()[$rule] ?? 'Unknown error occurred.';

        // Parametrlarni xabar matnida almashtirish
        if (!empty($params['field'])) {
            $message = str_replace('{field}', $params['field'], $message);
        } else {
            $params['field'] = $this->getLabel($attribute);
            $message = str_replace('{field}', $params['field'], $message);
        }

        // Qo'shimcha parametrlar bilan xabarni almashtirish
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }

        // Xato xabarini atributlar bo'yicha qo'shish
        $this->errors[$attribute][] = $message;
    }

    public function addSuccess(string $attribute, string $message) // addSuccess funksiyasi | use: (off)
    {
        $this->success[$attribute][] = $message;
    }

    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => 'This field is required.',
            self::RULE_EMAIL => 'This field must be a valid email address.',
            self::RULE_MIN => 'This field must be at least {min} characters.',
            self::RULE_MAX => 'This field must be less than {max} characters.',
            self::RULE_MATCH => 'This field must be the same as {match}.',
            self::RULE_UNIQUE => 'Record with this {field} already exists.',
            self::RULE_LOWERCASE => 'At least one lowercase letter must be involved in the combination. (a...z)',
            self::RULE_CAPITAL => 'At least one capital letter must be present in the combination. (A...Z)',
            self::RULE_NUMBER => 'At least one number must be involved in the combination.(0...9)',
            self::RULE_SPECIAL => 'At least one special character must be involved in the combination. (!@#$%^&)',
            // Terms uchun maxsus xato xabari qo'shamiz
            self::RULE_TERMS => 'You must agree to the terms and conditions.',
        ];
    }

    public function getRuleParams($attribute, $ruleName): ?array
    {
        foreach ($this->rules()[$attribute] as $rule) {
            if (is_array($rule) && $rule[0] === $ruleName) {
                return $rule; // Return the whole rule array, for example ['min' => 8]
            }
        }
        return null;
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function hasSuccess($attribute) // hasSuccess funksiyasi to'g'irlandi | use: (off)
    {
        return $this->success[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }

    public function getFirstSuccess($attribute) // Success uchun birinchi xabarni qaytarish | use: (off)
    {
        return $this->success[$attribute][0] ?? false;
    }
}