<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       24.09.2024
 * Time:       21:43
 */

use app\core\form\Form;
use app\core\Model;
use app\models\User;
use app\core\View;
/** @var  $this View */
$title = $this->title = 'Login / Sign In';
/* @var $model User
 *
 */
?>
<div class="container mt-5 ">
    <h1 class="mb-3"><?= htmlspecialchars($title ?? 'Login') ?></h1>
    <?php $form = Form::begin('', "post"); ?>
    <div class="row mb-3">
        <div class="col-lg-12 col-md-12">
            <?= $form->field($model, 'email')->reminder($_COOKIE["user_login"] ?? '') ?>
        </div>
        <div class="col-lg-12 col-md-12">
            <?= $form->field($model, 'password')->passwordField()->confirmPasswordShowField()->initialValue(); ?>
        </div>
    </div>
    <div class="row justify-content-start mb-3">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <input type="checkbox" name="remember"
                       id="remember" <?php if (isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                <label for="remember">Remember me</label>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="">
                <a class="form-group" href="<?= htmlspecialchars($loginUrl ?? '/register') ?>">
                    I have not an account
                </a>
            </div>
        </div>
    </div>
<button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
<?php Form::end(); ?>
</div>