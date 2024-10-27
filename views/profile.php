<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       24.09.2024
 * Time:       21:43
 */

use app\core\View;

/** @var  $this View */
$title = $this->title = 'Profile';
?>
<div class="container mt-5 ">
    <h1 class="mb-3"><?= htmlspecialchars($title ?? 'Profile') ?></h1>
    <p>This is the profile.</p>
</div>