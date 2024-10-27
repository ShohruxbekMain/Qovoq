<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       25.09.2024
 * Time:       19:35
 */

/** @var $exception Exception */

use app\core\View;

/** @var  $this View */

$title = $this->title = $exception->getCode() . ' - ' . $exception->getMessage();
?>
<div class="container text-center mt-5 h1">
    <h1><?= $exception->getCode(); ?> - <?= $exception->getMessage(); ?></h1>
</div>
