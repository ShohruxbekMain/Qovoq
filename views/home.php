<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       24.09.2024
 * Time:       21:58
 */
use app\controllers\SiteController;
/* @var $name SiteController */
?>
<div class="container mt-5">
    <h1 class="mb-3"><?= htmlspecialchars($title ?? 'Home') ?></h1>
    <h3>Welcome <?= $name ?></h3>
    <p>This is the home page.</p>
</div>

