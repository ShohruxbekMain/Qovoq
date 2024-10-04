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
    public const RULE_ALPHA = 'alpha';
    public const RULE_NUMERIC = 'numeric';
    public const RULE_ALPHA_NUMERIC = 'alpha_numeric';
    public const RULE_ALPHA_CHARACTERS = 'alpha_characters';
    public const RULE_ALPHA_NUMERIC_CHARACTERS = 'alpha_numeric_characters';
    public const RULE_TERMS = 'termsAccepted';

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if (is_bool($this->{$key})) {
                    $this->{$key} = isset($data[$key]) ? true : false;
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

    public array $errors = [];
    public array $success = [];

    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            $isSuccess = true; // Success bayrog'i | use: (off)

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
//                    $this->addError($attribute, "{$attribute} is required.");
                    $this->addError($attribute, self::RULE_REQUIRED);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_TERMS && !$value) {
                    $this->addError($attribute, self::RULE_TERMS);
                    $isSuccess = false;
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
//                    $this->addError($attribute, self::RULE_MIN, ['min' => $rule['min']]);
                    $this->addError($attribute, self::RULE_MIN, $rule);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
//                if ($ruleName === self::RULE_MATCH && $value !== $rule['match']) {
//                    $this->addError($attribute, self::RULE_MATCH);
//                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                    $isSuccess = false; // Error bo'lsa success bayrog'ini o'chiramiz | use: (off)
                }
            }

            // Agar hech qanday xato bo'lmasa, successni qo'shamiz
            if ($isSuccess) {
                $this->addSuccess($attribute, 'Success');
            }

        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';

        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
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