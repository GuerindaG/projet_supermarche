<?php
include('..\..\supermarche\connexion.php');
if (isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];
    $select = $conn->prepare("SELECT*FROM informationsm WHERE id='$id' ");
    $select->execute();
    $affiche = $select->fetch();
}else{
    header('Location:/../gestion_supermarche/index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Gestion des supermarches - Produits</title>
    <link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />
    <link href="../assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../asset/css/all.css">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">

    <style>
        .dropdown-toggle:after {
            display: none !important;
        }
    </style>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-M8S4MT3EYG");
    </script>
    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] =
                c[a] ||
                function () {
                    (c[a].q = c[a].q || []).push(arguments);
                };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "kuc8w5o9nt");
    </script>
     <style>
        .bg-image {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 300px; /* Ajustez cette hauteur selon vos besoins */
        }
    </style>

</head>

<body>
    <!-- navbar -->
    <div class="border-bottom">
        <div class="py-5">
            <div class="container">
                <div class="row w-100 align-items-center justify-content-between">
                    <div class="col-lg-1 text-start">
                        <a class="navbar-brand d-none d-lg-block" href="/../gestion_supermarche/index.php">
                            <img src="../../supermarche/<?php echo $affiche['logo']?> " width="100" height="100"/>
                        </a>
                    </div>
                    <div class="col-lg-6 text-center">
                        <p class="card-text">
                            <a href=""><i class="fas fa-phone ms-4"></i></a> <?php echo $affiche['contact']?>
                            <a href=""><i class="fas fa-envelope ms-4"></i></a> <?php echo $affiche['email']?>
                            <a href=""><i class="fas fa-map-marker-alt ms-4"></i></a> <?php echo $affiche['localisation']?>
                            <a href="<?php echo $affiche['siteweb']?>"><i class="fas fa-link ms-4"></i></a> Site Web<br>
                        </p>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block text-end">
                        <form action="#">
                            <div class="input-group">
                                <input class="form-control rounded" type="search" placeholder="Rechercher produits" />
                                <span class="input-group-append">
                                    <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1 text-end">
                        <div class="list-inline">
                            <div class="list-inline-item me-5 me-lg-0">
                                <a class="text-muted position-relative" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasRight">
                                    <h5><i class="fas fa-shopping-cart"></i></h5>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                        5
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-xxl-3 d-none d-lg-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/vendors/validation.js"></script>

        <main>
            <!-- section-->
            <div class="mt-4">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
            <!-- section -->
            <div class="mt-8 mb-lg-14 mb-8">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row gx-10">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <div class="row w-100">
                                <div class="col-lg-10 d-flex">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r1" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">RAYON 1</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r2" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">RAYON 2</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r3" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">RAYON 3</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r4" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">RAYON 4</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r5" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">RAYON 5</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r6" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">RAYON 6</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r7" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">RAYON 7</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-r8" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">RAYON 8</button>
                                    </li>
                                </div>
                                <div class="col-lg-2 ">
                                    <li class="nav-item" role="presentation">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                            role="button" aria-expanded="false">PLUS DE RAYON <i
                                                class="fas fa-chevron-down"></i> </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="pill"
                                                    data-bs-target="#pills-action">RAYON 9</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="pill"
                                                    data-bs-target="#pills-another">RAYON 10</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="pill"
                                                    data-bs-target="#pills-somethings">RAYON 11</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="pill"
                                                    data-bs-target="#pills-shampoing">RAYON 12</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="pill"
                                                    data-bs-target="#pills-cahier">RAYON 13</a></li>
                                        </ul>
                                    </li>
                                    </li>
                                </div>
                            </div>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-r1" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r2" role="tabpanel" aria-labelledby="pills-profile-tab"
                                tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r3" role="tabpanel" aria-labelledby="pills-contact-tab"
                                tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r4" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r5" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r6" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r7" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r8" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-r9" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-action" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-another" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-somethings" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-shampoing" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-cahier" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-1.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1800</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2400</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0 start-0">
                                                        <span class="badge bg-success">14%</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-2.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2400 </span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-3.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>
                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 2500</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            3000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Hot</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-4.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 3000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 3500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-5.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 1300</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <div class="position-absolute top-0">
                                                        <span class="badge bg-danger">Sale</span>
                                                    </div>
                                                    <!-- img -->
                                                    <img src="../assets/images/products/product-img-6.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->
                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA 1500
                                                        </span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-7.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div><span class="text-dark">FCFA 2500</span></div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-8.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 6000 </span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            7000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-9.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Slurrp Millet Chocolate
                                                </h2>

                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div>
                                                        <span class="text-dark">FCFA 1000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2000</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <img src="../assets/images/products/product-img-10.jpg"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid" />
                                                    <!-- action btn -->

                                                </div>

                                                <h2 class="fs-6">
                                                    Nom du produit
                                                </h2>

                                                <div class="d-flex justify-content-between mt-4">
                                                    <div>
                                                        <span class="text-dark">FCFA 2000</span>
                                                        <span class="text-decoration-line-through text-muted">FCFA
                                                            2500</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div>
                                                        <a href="#!" class="btn btn-primary btn-sm"
                                                            data-bs-target="#modalbasique" data-bs-toggle="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 ">
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </main>

        <!-- Shop Cart -->

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header border-bottom">
                <div class="text-start">
                    <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Panier</h5>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <ul class="list-group list-group-flush">
                        <!-- list group -->
                        <li class="list-group-item py-3 ps-0 border-top">
                            <!-- row -->
                            <div class="row align-items-center">
                                <div class="col-6 col-md-6 col-lg-7">
                                    <div class="d-flex">
                                        <img src="../assets/images/products/product-img-1.jpg" alt="Ecommerce"
                                            class="icon-shape icon-xxl" />
                                        <div class="ms-3">
                                            <!-- title -->
                                            <a href="../pages/shop-single.html" class="text-inherit">
                                                <h6 class="mb-0">Nom du produit</h6>
                                            </a>
                                            <!-- text -->
                                            <div class="mt-2 small lh-1">
                                                <a href="#!" class="text-decoration-none text-inherit">
                                                    <span class="me-1 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-success">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </span>
                                                    <span class="text-muted">Retirer</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- input group -->
                                <div class="col-4 col-md-3 col-lg-3">
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm"
                                            data-field="quantity" />
                                        <input type="number" step="1" max="10" value="1" name="quantity"
                                            class="quantity-field form-control-sm form-input" />
                                        <input type="button" value="+" class="button-plus btn btn-sm"
                                            data-field="quantity" />
                                    </div>
                                </div>
                                <!-- price -->
                                <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                    <span class="fw-bold">FCFA 5000</span>
                                </div>
                            </div>
                        </li>
                        <!-- list group -->
                        <li class="list-group-item py-3 ps-0">
                            <!-- row -->
                            <div class="row align-items-center">
                                <div class="col-6 col-md-6 col-lg-7">
                                    <div class="d-flex">
                                        <img src="../assets/images/products/product-img-2.jpg" alt="Ecommerce"
                                            class="icon-shape icon-xxl" />
                                        <div class="ms-3">
                                            <a href="./pages/shop-single.html" class="text-inherit">
                                                <h6 class="mb-0">Nom du profduit</h6>
                                            </a>
                                            <!-- text -->
                                            <div class="mt-2 small lh-1">
                                                <a href="#!" class="text-decoration-none text-inherit">
                                                    <span class="me-1 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-success">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </span>
                                                    <span class="text-muted">Retirer</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- input group -->
                                <div class="col-4 col-md-3 col-lg-3">
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm"
                                            data-field="quantity" />
                                        <input type="number" step="1" max="10" value="1" name="quantity"
                                            class="quantity-field form-control-sm form-input" />
                                        <input type="button" value="+" class="button-plus btn btn-sm"
                                            data-field="quantity" />
                                    </div>
                                </div>
                                <!-- price -->
                                <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                    <span class="fw-bold text-danger">FCFA 2000</span>
                                    <div class="text-decoration-line-through text-muted small">FCFA 2600</div>
                                </div>
                            </div>
                        </li>
                        <!-- list group -->
                        <li class="list-group-item py-3 ps-0">
                            <!-- row -->
                            <div class="row align-items-center">
                                <div class="col-6 col-md-6 col-lg-7">
                                    <div class="d-flex">
                                        <img src="../assets/images/products/product-img-3.jpg" alt="Ecommerce"
                                            class="icon-shape icon-xxl" />
                                        <div class="ms-3">
                                            <!-- title -->
                                            <a href="./pages/shop-single.html" class="text-inherit">
                                                <h6 class="mb-0">Nom du produit</h6>
                                            </a>
                                            <!-- text -->
                                            <div class="mt-2 small lh-1">
                                                <a href="#!" class="text-decoration-none text-inherit">
                                                    <span class="me-1 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-success">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </span>
                                                    <span class="text-muted">Retirer</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- input group -->
                                <div class="col-4 col-md-3 col-lg-3">
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm"
                                            data-field="quantity" />
                                        <input type="number" step="1" max="10" value="1" name="quantity"
                                            class="quantity-field form-control-sm form-input" />
                                        <input type="button" value="+" class="button-plus btn btn-sm"
                                            data-field="quantity" />
                                    </div>
                                </div>
                                <!-- price -->
                                <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                    <span class="fw-bold">FCFA 15000</span>
                                    <div class="text-decoration-line-through text-muted small">FCFA 20000</div>
                                </div>
                            </div>
                        </li>
                        <!-- list group -->
                        <li class="list-group-item py-3 ps-0">
                            <!-- row -->
                            <div class="row align-items-center">
                                <div class="col-6 col-md-6 col-lg-7">
                                    <div class="d-flex">
                                        <img src="../assets/images/products/product-img-4.jpg" alt="Ecommerce"
                                            class="icon-shape icon-xxl" />
                                        <div class="ms-3">
                                            <!-- title -->
                                            <!-- title -->
                                            <a href="./pages/shop-single.html" class="text-inherit">
                                                <h6 class="mb-0">Nom du produit</h6>
                                            </a>

                                            <!-- text -->
                                            <div class="mt-2 small lh-1">
                                                <a href="#!" class="text-decoration-none text-inherit">
                                                    <span class="me-1 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-success">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </span>
                                                    <span class="text-muted">Retirer</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- input group -->
                                <div class="col-4 col-md-3 col-lg-3">
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm"
                                            data-field="quantity" />
                                        <input type="number" step="1" max="10" value="1" name="quantity"
                                            class="quantity-field form-control-sm form-input" />
                                        <input type="button" value="+" class="button-plus btn btn-sm"
                                            data-field="quantity" />
                                    </div>
                                </div>
                                <!-- price -->
                                <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                    <span class="fw-bold">FCFA 1500</span>
                                    <div class="text-decoration-line-through text-muted small">FCFA 2000</div>
                                </div>
                            </div>
                        </li>
                        <!-- list group -->
                        <li class="list-group-item py-3 ps-0 border-bottom">
                            <!-- row -->
                            <div class="row align-items-center">
                                <div class="col-6 col-md-6 col-lg-7">
                                    <div class="d-flex">
                                        <img src="../assets/images/products/product-img-5.jpg" alt="Ecommerce"
                                            class="icon-shape icon-xxl" />
                                        <div class="ms-3">
                                            <!-- title -->
                                            <a href="./pages/shop-single.html" class="text-inherit">
                                                <h6 class="mb-0">Nom du produit</h6>
                                            </a>

                                            <!-- text -->
                                            <div class="mt-2 small lh-1">
                                                <a href="#!" class="text-decoration-none text-inherit">
                                                    <span class="me-1 align-text-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-success">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </span>
                                                    <span class="text-muted">Retirer</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- input group -->
                                <div class="col-4 col-md-3 col-lg-3">
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm"
                                            data-field="quantity" />
                                        <input type="number" step="1" max="10" value="1" name="quantity"
                                            class="quantity-field form-control-sm form-input" />
                                        <input type="button" value="+" class="button-plus btn btn-sm"
                                            data-field="quantity" />
                                    </div>
                                </div>
                                <!-- price -->
                                <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                    <span class="fw-bold">FCFA 1500</span>
                                    <div class="text-decoration-line-through text-muted small">FCFA 2000</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- btn -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="#!" class="btn btn-primary w-100">Passer à la caisse</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal PRINCIPAL -->
        <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-8">
                        <div class="position-absolute top-0 end-0 me-3 mt-3">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- img slide -->
                                <div class="product productModal" id="productModal">
                                    <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(../assets/images/products/product-single-img-1.jpg);
                ">
                                        <!-- img -->
                                        <img src="../assets/images/products/product-single-img-1.jpg" alt="">
                                    </div>
                                    <div>
                                        <div class="zoom" onmousemove="zoom(event)" style="
                    background-image: url(../assets/images/products/product-single-img-2.jpg);
                  ">
                                            <!-- img -->
                                            <img src="../assets/images/products/product-single-img-2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="zor²/*om" onmousemove="zoom(event)" style="
                    background-image: url(../assets/images/products/product-single-img-3.jpg);
                  ">
                                            <!-- img -->
                                            <img src="../assets/images/products/product-single-img-3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="zoom" onmousemove="zoom(event)" style="
                    background-image: url(../assets/images/products/product-single-img-4.jpg);
                  ">
                                            <!-- img -->
                                            <img src="../assets/images/products/product-single-img-4.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- product tools -->
                                <div class="product-tools">
                                    <div class="thumbnails row g-3" id="productModalThumbnails">
                                        <div class="col-3" class="tns-nav-active">
                                            <div class="thumbnails-img">
                                                <!-- img -->
                                                <img src="../assets/images/products/product-single-img-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="thumbnails-img">
                                                <!-- img -->
                                                <img src="../assets/images/products/product-single-img-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="thumbnails-img">
                                                <!-- img -->
                                                <img src="../assets/images/products/product-single-img-3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="thumbnails-img">
                                                <!-- img -->
                                                <img src="../assets/images/products/product-single-img-4.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ps-lg-8 mt-6 mt-lg-0">
                                    <a href="#!" class="mb-4 d-block">Intitulé du rayon</a>
                                    <h2 class="mb-1 h1">Nom du produit</h2>
                                    <div class="fs-4">
                                        <span class="fw-bold text-dark">FCFA 300</span>
                                        <span class="text-decoration-line-through text-muted">FCFA
                                            350</span><span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
                                    </div>
                                    <hr class="my-6">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <!-- input -->
                                            <!-- input -->
                                            <div class="input-group input-spinner  ">
                                                <input type="button" value="-" class="button-minus  btn  btn-sm "
                                                    data-field="quantity">
                                                <input type="number" step="1" max="10" value="1" name="quantity"
                                                    class="quantity-field form-control-sm form-input   ">
                                                <input type="button" value="+" class="button-plus btn btn-sm "
                                                    data-field="quantity">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 text-start">
                                            <h2>Prix total : 1000 FCFA</h2>
                                        </div>
                                    </div>
                                    <div class="mt-3 row justify-content-start g-2 align-items-center">

                                        <div class="col-lg-12 col-md-5 col-6 d-grid">
                                            <!-- button -->
                                            <!-- btn -->
                                            <button type="button" class="btn btn-primary w-100" data-bs-target="#error"
                                                data-bs-toggle="modal">
                                                <i class="fas fa-shopping-bag me-2"></i>Ajouter au panier
                                            </button>
                                        </div>
                                    </div>
                                    <hr class="my-6">
                                    <div>
                                        <table class="table table-borderless">
                                            <div class="table-title">
                                                <h2><small>INFORMATION</small></h2>
                                                <p>
                                                    Toutes les informations concernant le produit
                                                </p>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--MODAL -->
        <div class="modal fade" id="modalbasique" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-12 text-start">Quantité</div>
                            <div class="col-lg-4 text-start">
                                <div class="input-group input-spinner  ">
                                    <label for=""></label>
                                    <input type="button" value="-" class="button-minus  btn  btn-sm "
                                        data-field="quantity">
                                    <input type="number" id="qte" step="1" max="10" value="1" name="quantity"
                                        class="quantity-field form-control-sm form-input   ">
                                    <input type="button" value="+" class="button-plus btn btn-sm "
                                        data-field="quantity">
                                </div>
                            </div>

                            <div class="col-lg-8 mb-3">
                                <button type="button" class="btn btn-outline-secondary w-100">
                                    <h5>Prix unitaire :FCFA 1000</h5>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-12 text-end mb-3">
                            <h5>Prix total: <h3 class="text-success">FCFA 1000</h3>
                            </h5>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-12 text-end">
                            <button type="button" class="btn btn-primary w-100" data-bs-target="#succes"
                                data-bs-toggle="modal">
                                <i class="fas fa-shopping-bag me-2"></i>Ajouter au panier
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal de connexion-->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Connexion</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="email" placeholder="Entrez votre adresse email"
                                required />
                            <div class="invalid-feedback">Entrez votre adresse email</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="Entrez votre mot de passe" required />
                            <div class="invalid-feedback">Entrez votre mot de passe</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" type="submit">connexion</button>
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    Vous n'avez pas de compte?
                    <a href="#" data-bs-target="#modaluser" data-bs-toggle="modal">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'inscription-->
    <div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Inscription</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nom</label>
                                    <input type="nom" class="form-control" id="nom" placeholder="Entrez votre nom"
                                        required />
                                    <div class="invalid-feedback">Entrez votre nom</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom"
                                        placeholder="Entrez votre prenom" required />
                                    <div class="invalid-feedback">Entrez votre prenom</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" id="date"
                                        placeholder="Entrez votre date de naissance" required />
                                    <div class="invalid-feedback">Entrez votre date de naissance</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control" id="tel"
                                        placeholder="Entrez votre numéro de téléphone" required />
                                    <div class="invalid-feedback">Entrez votre numéro de téléphone</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Entrez votre adresse email" required />
                                    <div class="invalid-feedback">Entrez votre adresse email</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="fulltext" class="form-label">Adresse de résidence</label>
                                    <input type="text" class="form-control" id="email"
                                        placeholder="Entrez votre adresse de résidence" required />
                                    <div class="invalid-feedback">Entrez votre adresse de résidence</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Entrez votre mot de passe " required />
                                    <div class="invalid-feedback">Entrez votre mot de passe </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirmer mot de passe</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Confirmer votre mot de passe" required />
                                    <div class="invalid-feedback">Confirmer votre mot de passe</div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center mb-3">
                                <small class="form-text">
                                    En vous inscrivant, vous acceptez nos
                                    <a href="#!">Conditions de service</a>
                                    &
                                    <a href="#!">de Confidentialité</a>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Inscription</button>
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    Vous avez déjà un compte?
                    <a href="#" data-bs-target="#userModal" data-bs-toggle="modal">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-6">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
                            <p class="mb-0 small">Enter your address and we will specify the offer you area.</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="my-5">
                        <input type="search" class="form-control" placeholder="Search your area" />
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Select Location</h6>
                        <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>
                    </div>
                    <div>
                        <div data-simplebar style="height: 300px">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                                    <span>Alabama</span>
                                    <span>Min:$20</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Alaska</span>
                                    <span>Min:$30</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Arizona</span>
                                    <span>Min:$50</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>California</span>
                                    <span>Min:$29</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Colorado</span>
                                    <span>Min:$80</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Florida</span>
                                    <span>Min:$90</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Arizona</span>
                                    <span>Min:$50</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>California</span>
                                    <span>Min:$29</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Colorado</span>
                                    <span>Min:$80</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Florida</span>
                                    <span>Min:$90</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL ALERT-->
    <div class="modal fade" id="succes" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1><i class="fas fa-check text-success "></i></h1><br>
                    <h3><strong class="text-center">Succès! Produit ajouté.</strong></h3>
                    <div class="text-end"><button class="btn btn-success" type="submit">OK</button></div>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL ALERT 2 -->
    <div class="modal fade" id="error" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1><i class="fas fa-exclamation-triangle text-danger "></i></h1><br>
                    <h3><strong class="text-center">Echec! Réessayez.</strong></h3>
                    <div class="text-end"><button class="btn btn-danger" type="submit">OK</button></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript-->
    <script src="../assets/libs/nouislider/dist/nouislider.min.js"></script>
    <script src="../assets/libs/wnumb/wNumb.min.js"></script>
    <!-- Libs JS -->
    <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>

    <script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="../assets/js/vendors/tns-slider.js"></script>
    <script src="../assets/js/vendors/zoom.js"></script>

    <script>
        function calculTotal() {
            var prix = Number(document.getElementById("prixunit").value);
            var qte = Number(document.getElementById("qte").value);
            var total = Number(prix * qte);
            document.getElementById("prixtotal").value = total;
        }
        document.getElementById("qte").addEventListener("input", calculTotal);
    </script>
</body>

</html>