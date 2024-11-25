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
    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">

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
    <link rel="stylesheet" href="./assets/css/fonts.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <!--    <link rel="stylesheet" href="../../public/assets/css/style.css">-->
</head>
<body>

<nav class="navbar navbar-expand-lg bg-transparent border-bottom border-1 border-light-subtle" style=""
     data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="./assets/img/favicon.ico" alt="Q" height="36"
                                              style="margin-bottom: 6px;">Qovoq</a>
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
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/about") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/about") ? 'aria-current="page"' : '' ?>
                       href="/about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#/category" role="button" data-bs-auto-close="outside"
                       data-bs-toggle="dropdown"
                       aria-expanded="false" data-bs-offset="10,20">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropend">
                            <a class="dropdown-item dropdown-toggle <?= ($_SERVER['REQUEST_URI'] === "/category") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/category") ? 'aria-current="page"' : '' ?>
                               data-bs-toggle="dropdown" href="#" role="button">Electronics</a>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item">Smartphones</a></li>
                                <li><a href="" class="dropdown-item">Computers</a></li>
                                <li><a href="" class="dropdown-item">Watches</a></li>
                            </ul>
                        </li>
                        <li class="dropend">
                            <a class="dropdown-item dropdown-toggle <?= ($_SERVER['REQUEST_URI'] === "/category") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/category") ? 'aria-current="page"' : '' ?>
                               data-bs-toggle="dropdown" href="#" role="button">Household appliances</a>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item">Home appliances</a></li>
                                <li><a href="" class="dropdown-item">Technique for beauty</a></li>
                                <li><a href="" class="dropdown-item">Kitchen appliances</a></li>
                            </ul>
                        </li>
                        <li class="dropend">
                            <a class="dropdown-item dropdown-toggle <?= ($_SERVER['REQUEST_URI'] === "/category") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/category") ? 'aria-current="page"' : '' ?>
                               data-bs-toggle="dropdown" href="#" role="button">Clothes</a>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item">Clothes for men</a></li>
                                <li><a href="" class="dropdown-item">Clothes for women</a></li>
                                <li><a href="" class="dropdown-item">Clothes for children</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === "/contact") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/contact") ? 'aria-current="page"' : '' ?>
                       href="/contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 w-25">
                <li class="nav-item w-100">
                    <form class="d-flex w-100" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary d-flex align-items-center justify-content-center" style="height: 43px; width: 43px;" type="submit"><i class='bx bx-search bx-sm'></i></button>
                    </form>
                </li>
            </ul>
            <?php if (Application::isGuest()) : ?>
                <ul class="navbar-nav ms-2 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link link-offset-3 text-decoration-underline <?= ($_SERVER['REQUEST_URI'] === "/login") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/login") ? 'aria-current="page"' : '' ?>
                           href="/login">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-offset-3 text-decoration-underline <?= ($_SERVER['REQUEST_URI'] === "/register") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/register") ? 'aria-current="page"' : '' ?>
                           href="/register">Sign Up</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="navbar-nav ms-2 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <?= Application::$app->user->getDisplayName(); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Purchase history</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
            <ul class="navbar-nav ms-2 mb-2 mb-lg-0">
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 42px;width: 42px;">
                        <i class='bx bxs-cart bx-sm'></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Shopping cart</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="<?= (Application::isGuest()) ? 'border-bottom border-1 border-secondary-subtle mb-2' : ''; ?> d-flex justify-content-center">
                                        <p class="h5">
                                            (the shopping cart is empty!)
                                        </p>
                                    </div>
                                    <?php if (Application::isGuest()) : ?>
                                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                                            <i class='bx bxs-info-circle bx-sm flex-shrink-0 me-2'
                                               aria-label="Warning:"></i>
                                            <div>You are not signed in, please
                                                <a class="link-offset-3 text-decoration-underline <?= ($_SERVER['REQUEST_URI'] === "/login") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/login") ? 'aria-current="page"' : '' ?>
                                                   role="button" href="/login">Sign In</a>
                                                or
                                                <a class="link-offset-3 text-decoration-underline <?= ($_SERVER['REQUEST_URI'] === "/register") ? 'active' : '' ?>" <?= ($_SERVER['REQUEST_URI'] === "/register") ? 'aria-current="page"' : '' ?>
                                                   role="button" href="/register">Sign Up</a>
                                                to continue
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="button"
                                            class="btn btn-primary" <?= (Application::isGuest()) ? 'disabled' : ''; ?>>
                                        Payment page
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Breadcrumb -->
<?php if (isset($breadcrumbs) && !empty($breadcrumbs)): ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php foreach ($breadcrumbs as $name => $url): ?>
                <li class="breadcrumb-item">
                    <?php if ($url): ?>
                        <a href="<?= htmlspecialchars($url) ?>"><?= htmlspecialchars($name) ?></a>
                    <?php else: ?>
                        <?= htmlspecialchars($name) ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
<?php endif; ?>
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
