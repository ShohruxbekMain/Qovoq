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
use app\models\RegisterModel;

/* @var $model RegisterModel
 *
 */


?>
<div class="container mt-5 ">
    <h1 class="mb-3">Create an account</h1>
    <?php $form = Form::begin('', "post"); ?>
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
        <div class="col-lg-6 col-md-12">
            <?= $form->field($model, 'password')->passwordField()->passwordHelpAreaField()->initialValue(); ?>

        </div>
        <div class="col-lg-6 col-md-12">
            <?= $form->field($model, 'confirmPassword')->passwordField()->initialValue(); ?>
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
                <a class="form-group" href="/login">I have already an account</a>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
    <?php Form::end(); ?>
</div>
