<?php
session_start();
include("supermarche\connexion.php");

//AFFICHAGE DU TABLEAU
$sql = $conn->prepare("SELECT*FROM `informationsm` WHERE compte = 1 ORDER BY date_heure DESC  ");
$sql->execute();

//DATETIME
$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Gestion des supermarchés</title>

    <link href="supermarche\assets/libs/slick-carousel/slick/slick.css" rel="stylesheet" />
    <link href="supermarche\assets/libs/slick-carousel/slick/slick-theme.css" rel="stylesheet" />
    <link href="supermarche\assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />
    <link rel="stylesheet" href="supermarche/asset/css/all.css">
    <link rel="stylesheet" href="supermarche/pages/404error.html">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="supermarche\assets/images/favicon/favicon.ico">
    <!-- Libs CSS -->
    <link href="supermarche\assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="supermarche\assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="supermarche\assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="supermarche\assets/css/theme.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <!-- SweetAlert Stylesheet -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
<?php
        if (isset($_SESSION['alertMessage'])) {
    ?>
        <script type='text/javascript'>
            Swal.fire({
            icon: "error",
            text: "<?php echo addslashes($_SESSION['alertMessage']);?>",
            });
        </script>
    <?php
        unset($_SESSION['alertMessage']);
    }
    if(isset($_SESSION['success'])){
    ?>
    <script type='text/javascript'>
        Swal.fire({
        text: "<?php echo addslashes($_SESSION['success']); ?>",
        icon: 'success'
        });
    </script>

    <?php 
        unset($_SESSION['success']);
    }
    
    ?>
    <!-- navbar -->
    <div class="border-bottom">
        <div class="py-5">
            <div class="container">
                <div class="row w-100 align-items-center gx-lg-2 gx-0">
                    <div class="col-lg-2 text-start">
                        <a class="navbar-brand d-none d-lg-block" href="./index.php">
                            <img src="supermarche\assets/images/logo/freshcart-logo.svg" alt="eCommerce HTML Template" />
                        </a>
                        <div class="d-flex justify-content-between w-100 d-lg-none">
                            <a class="navbar-brand" href="./index.php">
                                <img src="supermarche\assets/images/logo/freshcart-logo.svg" alt="eCommerce HTML Template" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block text-center">
                        
                        <form method="GET">
                            <div class="input-group">
                                <input class="form-control rounded" type="search" name="a"
                                    placeholder="Rechercher un supermarché" />
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
                    <div class="col-lg-3 d-none d-lg-block text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-gray-400 text-muted" data-bs-toggle="modal"
                            data-bs-target="#locationModal">
                            <span class="text-success"><i class="fas fa-map-pin me-2"></i></span>
                            Rechercher supermarché à proximité
                            
                        </button>
                    </div>
                    <div class="col-lg-3 text-center">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#userModal">INSCRIVEZ VOTRE SUPERMARCHÉ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <main>

        <!-- Category Section Start-->
        <section class="mb-lg-10 mt-lg-14 my-8">
            <div class="container">
                <div class="row">
                        <div class="col-12 mb-6">
                            <h3 class="mb-0"> Supermarchés</h3>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        while($aff=$sql->fetch()){
                        ?>
                        <div class="col-lg-4 mb-3">
                                <div class="card card-product">
                                    <!--img-->
                                    <a href="./supermarche/pages/marche.php?id=<?php echo $aff['id'] ?>" class="bg-image" style="background-image: url('supermarche/<?php echo htmlspecialchars($aff['logo'], ENT_QUOTES, 'UTF-8'); ?>');"></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $aff['nom'] ?></h5>
                                        <p class="card-text">
                                            <i class="fas fa-phone"></i><?php echo $aff['contact'] ?><br>
                                            <i class="fas fa-envelope"></i> <?php echo $aff['email'] ?><br>
                                            <i class="fas fa-map-marker-alt"></i> <?php echo $aff['localisation'] ?> <br>
                                            <i class="fas fa-link"></i><a href="<?php echo $aff['siteweb'] ?>">Voir le site</a> <br>
                                            <i class="fas fa-time"></i>Ouvert de <?php echo $aff['ouverture'] ?> à <?php echo $aff['fermeture'] ?>
                                        </p>
                                        
                                    </div>
                                </div>
                        </div>
                    <?php
                        }
                    ?>

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
        </section>
    </main>


    <!-- Modal d'inscription-->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Inscription</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="supermarche/traittementInscriptionSm" novalidate
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nom du Supermarché</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">IFU</label>
                                    <input type="number" class="form-control" name="ifu" placeholder="Entrez votre IFU"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fulltext" class="form-label">RCCM</label>
                                    <input type="text" class="form-control" name="rccm"
                                        placeholder="Entrez votre RCCM" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Entrez votre email" required />
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="">
                                    <label for="number" class="form-label">Contact</label>
                                    <input type="tel" class="form-control" name="contact"
                                        placeholder="Entrez votre contact" required />
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="">
                                    <label for="url" class="form-label">Site Web</label>
                                    <input type="url" class="form-control" name="siteweb"
                                        placeholder="Avez-vous un site web?"  />
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="">
                                    <label for="url" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" name="longitude"
                                        placeholder="Ex: 4°50'32'' est" required />
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="">
                                    <label for="url" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" name="latitude"
                                        placeholder="Ex: 45°45'35'' nord" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="">
                                    <label for="fulltext" class="form-label">Localisation</label>
                                    <input type="text" class="form-control" name="localisation"
                                        placeholder="Entrez votre localisation" required />
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="">
                                    <label for="fulltext" class="form-label">Heure d'ouverture</label>
                                    <input type="time" class="form-control" name="ouverture"
                                        placeholder="Entrez l'heure d'ouverture" required />
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="">
                                    <label for="fulltext" class="form-label">Heure de fermeture</label>
                                    <input type="time" class="form-control" name="fermeture"
                                        placeholder="Entrez l'heure de fermeture " required />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="recipient-name" class="col-form-label">Enseigne du supermarché</label>
                                <input type="file" name="logo" placeholder="Choisir votre enseigne"
                                    class="form-control pop">
                            </div>
                        </div>
                        <div class="text-end"><button type="submit" class="btn btn-primary w-100">SOUMETTRE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Localisation-->
    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-6">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-1" id="locationModalLabel">Choisir votre position</h5>
                            <p class="mb-0 small">Entrer votre localisation</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="my-5">
                        <input type="search" class="form-control" placeholder="Rechercher votre ville" />
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Selectionner votre ville</h6>
                        <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Tout effacer</a>
                    </div>
                    <div>
                        <div data-simplebar style="height: 300px">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                                    <span>Abomey-Calavi</span>
                                    <span>Atlantique</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Cotonou</span>
                                    <span>Littoral</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Bohicon</span>
                                    <span>Zou</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Porto-Novo</span>
                                    <span>Couffo</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Abomey</span>
                                    <span>Zou</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Djougou</span>
                                    <span>Atacora</span>
                                </a>
                                <a href="#"
                                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                    <span>Abomey-Calavi</span>
                                    <span>Atlantique</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     
    <!-- Javascript-->
    <script src="supermarche\assets/js/vendors/validation.js"></script>
    <!-- Libs JS -->
    <!-- <script src="supermarche\assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="supermarche\assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="supermarche\assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="supermarche\assets/js/theme.min.js"></script>

    <script src="supermarche\assets/js/vendors/jquery.min.js"></script>
    <script src="supermarche\assets/js/vendors/countdown.js"></script>
    <script src="supermarche\assets/libs/slick-carousel/slick/slick.min.js"></script>
    <script src="supermarche\assets/js/vendors/slick-slider.js"></script>
    <script src="supermarche\assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="supermarche\assets/js/vendors/tns-slider.js"></script>
    <script src="supermarche\assets/js/vendors/zoom.js"></script>
</body>

</html>