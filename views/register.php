<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       24.09.2024
 * Time:       21:43
 */

//use app\controllers\AuthController;
use app\core\form\Form;
use app\core\Model;
use app\models\User;
use app\core\View;
/** @var  $this View */
$this->title = 'Create an account / Sign up';
$title = $this->title;
/* @var $model User
 *
 */

$minRule = $model->getRuleParams('password', Model::RULE_MIN);
$minValue = $minRule['min'] ?? '8'; // O'zgartirilsa avtomatik
$maxRule = $model->getRuleParams('password', Model::RULE_MAX);
$maxValue = $maxRule['max'] ?? '24'; // O'zgartirilsa avtomatik
?>
<div class="container mt-5 ">
    <h1 class="mb-3"><?= htmlspecialchars($title ?? 'Create an account') ?></h1>
    <?php $form = Form::begin('', "post"); ?>
<!--    <input type="hidden" name="csrf_token" value="--><?php //= htmlspecialchars($_SESSION['csrf_token']) ?><!--">-->
    <div class="row mb-3">
        <div class="col-lg-6 col-md-12">
            <?= $form->field($model, 'firstname') ?>
        </div>
        <div class="col-lg-6 col-md-12">
            <?= $form->field($model, 'lastname') ?>
        </div>
        <div class="col-lg-12 col-md-12">
            <?= $form->field($model, 'email')->emailField(); ?>
        </div>
        <div class="col-lg-6 col-md-12 ">
            <?= $form->field($model, 'password')->passwordField()->passwordHelpAreaField()->passwordShowField()->initialValue(); ?>
            <input type="hidden" id="minPasswordLength" value="<?= $minValue ?>">
            <input type="hidden" id="maxPasswordLength" value="<?= $maxValue ?>">

            <div class="form-text password-required">
                <ul>
                    <li><h5>Password must contains</h5></li>
                    <li class="lowercase">
                        <span></span>
                        <?= htmlspecialchars($model->errorMessages()[Model::RULE_LOWERCASE]) ?>
                    </li>
                    <li class="capital">
                        <span></span>
                        <?= htmlspecialchars($model->errorMessages()[Model::RULE_CAPITAL]) ?>
                    </li>
                    <li class="number">
                        <span></span>
                        <?= htmlspecialchars($model->errorMessages()[Model::RULE_NUMBER]) ?>
                    </li>
                    <li class="special">
                        <span></span>
                        <?= htmlspecialchars($model->errorMessages()[Model::RULE_SPECIAL]) ?>
                    </li>
                    <li class="min-limit">
                        <span></span>
                        <?= htmlspecialchars(str_replace('{min}', $minValue, $model->errorMessages()[Model::RULE_MIN])) ?>
                    </li>
                    <li class="max-limit">
                        <span></span>
                        <?= htmlspecialchars(str_replace('{max}', $maxValue, $model->errorMessages()[Model::RULE_MAX])) ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <?= $form->field($model, 'confirmPassword')->passwordField()->confirmPasswordShowField()->initialValue(); ?>
        </div>
    </div>
    <div class="row justify-content-start mb-3">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'termsAccepted')->checkBox() ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="">
                <a class="form-group" href="<?= htmlspecialchars($loginUrl ?? '/login') ?>">I have already an
                    account</a>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
    <?php Form::end(); ?>
</div>
