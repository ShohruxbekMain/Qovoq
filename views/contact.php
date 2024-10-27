<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       24.09.2024
 * Time:       21:43
 */


use app\core\form\Form;
use app\core\form\TextareaField;
use app\core\View;
use app\models\ContactForm;

/** @var  $this View */
/** @var  $model ContactForm */

$title = $this->title = 'Contact page';
?>
<div class="container mt-5 ">
    <h1 class="mb-3"><?= htmlspecialchars($title) ?></h1>
    <p>This is the contact page paragraph.</p>
    <?php $form = Form::begin('', 'post') ?>
    <?= $form->field($model, 'subject'); ?>
    <?= $form->field($model, 'email')->emailField(); ?>
    <!--    --><?php //= $form->field($model, 'body'); ?>
    <?= new TextareaField($model, 'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php Form::end(); ?>

</div>