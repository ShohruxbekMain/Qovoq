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

use app\core\View;

/** @var  $this View */
$title = $this->title = 'Home page';
?>
<div class="container mt-3">
    <h1 class="mb-3 d-none"><?= htmlspecialchars($title) ?></h1>
    <h1 class="text-center display-1">Welcome <?= $name ?> to the "Qovoq" online store</h1>
    <p>"Qovoq" online store - full of quality and convenient products, invites you to use our service at the best
        prices. We have a wide range of products including electronics, clothing, and homeware. Visit our page to find
        the goods that suit your needs and have a comfortable shopping experience!</p>

    <div class="d-flex align-items-center justify-content-between bg-secondary-subtle w-100 mb-3 p-3 rounded-3">
        <ul class="nav nav-pills w-100 align-items-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active  position-relative" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                    Latest
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                    <span class="visually-hidden">Latest</span>
                </span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Electronics
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Household
                    appliances
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-category-tab" data-bs-toggle="pill" data-bs-target="#pills-category"
                        type="button" role="tab" aria-controls="pills-category" aria-selected="false">Clothes
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
                        type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled
                </button>
            </li>
        </ul>
        <div>
            <a
                    href="#"
                    id="list"
                    role="button"
                    class="btn btn-primary d-flex align-items-center justify-content-center"
                    style="display:inline-block;width: 38px; height: 38px; padding: 0;">
                <div class="list-grid-toggle">
                    <div class="icon">
                        <div class="icon-bar"></div>
                        <div class="icon-bar"></div>
                        <div class="icon-bar"></div>
                    </div>
                    <span class="label">List</span>
                </div>
            </a>
        </div>

        <ul class="nav navbar navbar-expand-lg ms-auto">
            <li class="nav-item ms-2 me-2">
                <a href="#" id="list" role="button" class="btn btn-primary"
                   style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    <i class='bx bx-menu bx-sm'></i>
                </a>
            </li>
            <li class="nav-item ms-2 me-2">
                <a href="#" id="grid" role="button" class="btn btn-primary"
                   style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    <i class='bx bxs-grid-alt bx-sm'></i>
                </a>
            </li>
            <li class="nav-item ms-2 me-2">
                <div class="dropdown">
                    <button class="btn btn-primary" type="button" data-bs-toggle="dropdown" data-bs-offset="10,10"
                            aria-expanded="false"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        <i class='bx bxs-filter-alt bx-sm'></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Popular</a></li>
                        <li><a class="dropdown-item" href="#">Rated</a></li>
                        <li><a class="dropdown-item" href="#">cheapest</a></li>
                        <li><a class="dropdown-item" href="#">most expensive</a></li>
                        <li><a class="dropdown-item" href="#">much ordered</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>


    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
             tabindex="0">
            <div class="row g-3 list-group-wrapper" id="products">
                <div class="col-3 item">
                    <div class="card rounded-4" style="--bs-card-height: 480px;">
                        <img src="./assets/img/pumkin.jpg" class="card-img-top rounded-4 p-2"
                             style="height: 240px; object-fit: contain;object-position: center; mix-blend-mode: darken;"
                             alt="...">
                        <div class="card-body row row-column pt-1 pb-2">
                            <h5 class="card-title">Card title</h5>
                            <div class="badge-group mb-2 opacity-75">
                                <span class="badge text-bg-secondary">Electronics</span>
                                <span class="badge text-bg-secondary">Smartphones</span>
                                <span class="badge text-bg-secondary">Xiaomi</span>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                <div class="text-decoration-line-through text-secondary h6">89.99%</div>
                                <div class="text-success">29.99$</div>
                            </div>

                            <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About product</a>
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3 item">
                    <div class="card rounded-4" style="--bs-card-height: 480px;">
                        <img src="./assets/img/pumkin.jpg" class="card-img-top rounded-4 p-2"
                             style="height: 240px; object-fit: contain;object-position: center; mix-blend-mode: darken;"
                             alt="...">
                        <div class="card-body row row-column pt-1 pb-2">
                            <h5 class="card-title">Card title</h5>
                            <div class="badge-group mb-2 opacity-75">
                                <span class="badge text-bg-secondary">Clothes</span>
                                <span class="badge text-bg-secondary">Clothes for men</span>
                                <span class="badge text-bg-secondary">Nike</span>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                <div class="text-decoration-line-through text-secondary h6">8.49%</div>
                                <div class="text-success">4.79$</div>
                            </div>
                            <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About product</a>
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 item">
                    <div class="card rounded-4" style="--bs-card-height: 480px;">
                        <img src="./assets/img/pumkin.jpg" class="card-img-top rounded-4 p-2"
                             style="height: 240px; object-fit: contain;object-position: center; mix-blend-mode: darken;"
                             alt="...">
                        <div class="card-body row row-column pt-1 pb-2">
                            <h5 class="card-title">Card title</h5>
                            <div class="badge-group mb-2 opacity-75">
                                <span class="badge text-bg-secondary">Household appliances</span>
                                <span class="badge text-bg-secondary">Kitchen appliances</span>
                                <span class="badge text-bg-secondary">washing machine</span>
                                <span class="badge text-bg-secondary">LG</span>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk...</p>
                            <div class="h5 mb-2">100$</div>
                            <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About product</a>
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 item">
                    <div class="card rounded-4" style="--bs-card-height: 480px;">
                        <img src="./assets/img/pumkin.jpg" class="card-img-top rounded-4 p-2"
                             style="height: 240px; object-fit: contain;object-position: center; mix-blend-mode: darken;"
                             alt="...">
                        <div class="card-body row row-column pt-1 pb-2">
                            <h5 class="card-title">Card title</h5>
                            <div class="badge-group mb-2 opacity-75">
                                <span class="badge text-bg-secondary">Electronics</span>
                                <span class="badge text-bg-secondary">Watches</span>
                                <span class="badge text-bg-secondary">Smartwatches</span>
                                <span class="badge text-bg-secondary">Apple Watch</span>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="h5 mb-2">100$</div>
                            <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About product</a>
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center"
                                   style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="Page navigation example" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3 bg-secondary-subtle" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">Smartphones
                    </button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">Computers
                    </button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false">Watches
                    </button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab" tabindex="0">
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/phone.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Electronics</span>
                                            <span class="badge text-bg-secondary">Smartphones</span>
                                            <span class="badge text-bg-secondary">Xiaomi</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                            <div class="text-decoration-line-through text-secondary h6">89.99%</div>
                                            <div class="text-success">29.99$</div>
                                        </div>

                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/phone.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Clothes</span>
                                            <span class="badge text-bg-secondary">Clothes for men</span>
                                            <span class="badge text-bg-secondary">Nike</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                            <div class="text-decoration-line-through text-secondary h6">8.49%</div>
                                            <div class="text-success">4.79$</div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/phone.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Household appliances</span>
                                            <span class="badge text-bg-secondary">Kitchen appliances</span>
                                            <span class="badge text-bg-secondary">washing machine</span>
                                            <span class="badge text-bg-secondary">LG</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the
                                            bulk...</p>
                                        <div class="h5 mb-2">100$</div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/phone.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Electronics</span>
                                            <span class="badge text-bg-secondary">Watches</span>
                                            <span class="badge text-bg-secondary">Smartwatches</span>
                                            <span class="badge text-bg-secondary">Apple Watch</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="h5 mb-2">100$</div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/computer.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Electronics</span>
                                            <span class="badge text-bg-secondary">Smartphones</span>
                                            <span class="badge text-bg-secondary">Xiaomi</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                            <div class="text-decoration-line-through text-secondary h6">89.99%</div>
                                            <div class="text-success">29.99$</div>
                                        </div>

                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/computer.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Clothes</span>
                                            <span class="badge text-bg-secondary">Clothes for men</span>
                                            <span class="badge text-bg-secondary">Nike</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                            <div class="text-decoration-line-through text-secondary h6">8.49%</div>
                                            <div class="text-success">4.79$</div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/computer.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Household appliances</span>
                                            <span class="badge text-bg-secondary">Kitchen appliances</span>
                                            <span class="badge text-bg-secondary">washing machine</span>
                                            <span class="badge text-bg-secondary">LG</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the
                                            bulk...</p>
                                        <div class="h5 mb-2">100$</div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/computer.jpg" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;" alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Electronics</span>
                                            <span class="badge text-bg-secondary">Watches</span>
                                            <span class="badge text-bg-secondary">Smartwatches</span>
                                            <span class="badge text-bg-secondary">Apple Watch</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="h5 mb-2">100$</div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                         aria-labelledby="v-pills-messages-tab" tabindex="0">
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/watch.png" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;mix-blend-mode: darken;"
                                         alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Electronics</span>
                                            <span class="badge text-bg-secondary">Smartphones</span>
                                            <span class="badge text-bg-secondary">Xiaomi</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                            <div class="text-decoration-line-through text-secondary h6">89.99%</div>
                                            <div class="text-success">29.99$</div>
                                        </div>

                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/watch.png" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;mix-blend-mode: darken;"
                                         alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Clothes</span>
                                            <span class="badge text-bg-secondary">Clothes for men</span>
                                            <span class="badge text-bg-secondary">Nike</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="d-flex flex-wrap gap-3 align-items-center h5 mb-2">
                                            <div class="text-decoration-line-through text-secondary h6">8.49%</div>
                                            <div class="text-success">4.79$</div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/watch.png" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;mix-blend-mode: darken;"
                                         alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Household appliances</span>
                                            <span class="badge text-bg-secondary">Kitchen appliances</span>
                                            <span class="badge text-bg-secondary">washing machine</span>
                                            <span class="badge text-bg-secondary">LG</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the
                                            bulk...</p>
                                        <div class="h5 mb-2">100$</div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded-4" style="--bs-card-height: 480px;">
                                    <img src="./assets/img/watch.png" class="card-img-top rounded-4 p-2"
                                         style="height: 240px; object-fit: contain;object-position: center;mix-blend-mode: darken;"
                                         alt="...">
                                    <div class="card-body row row-column pt-1 pb-2">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="badge-group mb-2 opacity-75">
                                            <span class="badge text-bg-secondary">Electronics</span>
                                            <span class="badge text-bg-secondary">Watches</span>
                                            <span class="badge text-bg-secondary">Smartwatches</span>
                                            <span class="badge text-bg-secondary">Apple Watch</span>
                                        </div>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk
                                            of the card's content.</p>
                                        <div class="h5 mb-2">100$</div>
                                        <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="height: 42px;"><i class='bx bxs-layer-plus bx-sm me-2'></i> About
                                                product</a>
                                            <a href="#"
                                               class="btn btn-primary d-flex align-items-center justify-content-center"
                                               style="width: 42px; height: 42px;"><i class='bx bxs-cart-add bx-sm'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            Rated
        </div>
        <div class="tab-pane fade" id="pills-category" role="tabpanel" aria-labelledby="pills-category-tab"
             tabindex="0">Category
        </div>
        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
             tabindex="0">Disabled
        </div>
    </div>
</div>

