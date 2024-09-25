<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       25.09.2024
 * Time:       10:50
 */

use app\core\Application;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$title</title>
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/") ? 'aria-current="page"' : '' ?>  href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/contact") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/contact") ? 'aria-current="page"' : '' ?> href="/contact">Contact</a>
                </li>
            </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/login") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/login") ? 'aria-current="page"' : '' ?>
                           href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/register") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/register") ? 'aria-current="page"' : '' ?>
                           href="/register">Register</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
{{content}}
<!--<script src="../../public/assets/js/jquery-3.7.1.min.js"></script>
<script src="../../public/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../public/assets/js/bootstrap-notify.min.js"></script>-->

<script src="./assets/js/jquery-3.7.1.min.js"></script>
<script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="./assets/js/bootstrap-notify.min.js"></script>
<!--<script src="../../public/assets/js/script.js"></script>-->
</body>
</html>
