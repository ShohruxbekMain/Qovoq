<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       25.09.2024
 * Time:       10:50
 */

use app\controllers\SiteController;
use app\core\Application;
use app\core\View;

/* @var $title View */
$title = $this->title;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Default Title') ?></title>
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/") ? 'aria-current="page"' : '' ?>
                       href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/contact") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/contact") ? 'aria-current="page"' : '' ?>
                       href="/contact">Contact</a>
                </li>
            </ul>
            <?php if (Application::isGuest()) : ?>
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
            <?php else: ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <?= Application::$app->user->getDisplayName(); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?php if (Application::$app->session->getFlash('success')): ?>
    <div class="alert alert-success alert-dismissible fade show container my-2" role="alert">
        <?= Application::$app->session->getFlash('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
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
