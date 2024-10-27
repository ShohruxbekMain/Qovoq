<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       25.09.2024
 * Time:       10:50
 */

use app\core\Application;
use app\core\View;

/* @var $this View */
$title = $this->title;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="icon" href="./assets/img/favicon_io/favicon.ico" type="image/x-icon">
    <!--    <link rel="stylesheet" href="../../public/assets/css/bootstrap/bootstrap.min.css">-->
    <!--    <link rel="stylesheet" href="../../public/assets/css/boxicons.min.css">-->
    <!--    <link rel="stylesheet" href="../../public/assets/css/animate.min.css">-->
    <!--    <link rel="stylesheet" href="../../public/assets/css/animations.css">-->
    <!--    <link rel="stylesheet" href="../../public/assets/css/transformations.css">-->
    <!--    <link rel="stylesheet" href="../../public/assets/css/style.css">-->

    <link rel="stylesheet" href="./assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/boxicons.min.css">
    <link rel="stylesheet" href="./assets/css/animate.min.css">
    <link rel="stylesheet" href="./assets/css/animations.css">
    <link rel="stylesheet" href="./assets/css/transformations.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
{{content}}
<!--<script src="../../public/assets/js/jquery-3.7.1.min.js"></script>
<script src="../../public/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../public/assets/js/bootstrap-notify.min.js"></script>-->

<script src="./assets/js/jquery-3.7.1.min.js"></script>
<script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="./assets/js/bootstrap-notify.min.js"></script>
<?php if ($_SERVER['REQUEST_URI'] === '/register'): ?>
    <script src="./assets/js/register.js"></script> <!-- Faqat /register sahifasida -->
<?php endif; ?>
<script src="./assets/js/main.js"></script>
<!--<script src="../../public/assets/js/script.js"></script>-->
</body>
</html>
