<?php
session_start();
include('connexion.php');
//var_export($_SESSION);
// Empêcher la mise en cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php"); // Redirige vers la page de connexion
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Codescandy" name="author" />
    <title>Gestion de supermarchés</title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico" />

    <!-- Libs CSS -->
    <link href="./assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="./assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet" />
    <link href="./assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./asset/css/all.css">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/theme.min.css" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-M8S4MT3EYG");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- navigation -->
    <nav class="navbar navbar-glass row">
		<div class="col-lg-6"><h2>Tableau de bord de <?php echo $_SESSION["nom"]?></h2></div>
		<div class="col-lg-3"> <h5>
				<?php
					if($_SESSION['etat']==true){
						echo"Abonnement:<br><span id='countdown'></span>";
					}else{
						?>
                <div id="heure"></div>
						<?php
					}
				?>
            </h5></div>
		<div class="col-lg-3 text-end">
			<a href="deconnecter.php"><button class="btn btn btn-primary">DECONNEXION</button></a>
		</div> 
	</nav>
    <div class="main-wrapper">
        <nav class="navbar-vertical-nav d-none d-xl-block">
            <div class="navbar-vertical">
                <div class="px-4 py-5">
                    <a href="index.php" class="navbar-brand">
                        <img src="./assets/images/logo/freshcart-logo.svg" alt="" />
                    </a>
                </div>
                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column" id="sideNavbar">
                        <li class="nav-item">
                            <a class="nav-link " href="dashbord.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="fa bi-house"></i></span>
                                    <span class="nav-link-text">Stockage</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link   " href="categories.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                                    <span class="nav-link-text">Rayons</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="commande.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                                    <span class="nav-link-text">Commandes</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="vente.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                                    <span class="nav-link-text">Vente</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="clients.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Clients</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="caisse.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-newspaper"></i></span>
                                    <span class="nav-link-text">Caisse</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="fournisseur.php">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-shop"></i></span>
                                    <span class="nav-link-text">Fournisseurs</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Paramètres du site</span>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link " href="../supermarche/pages/marche.php?id=<?php echo $_SESSION['id'] ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-images"></i></span>
                                    <span class="nav-link-text">Site</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="main-content-wrapper">
            <section class="container">
                <!-- table -->
                <?php
					include('card.php');
				?>
                <div class="card h-100 card-lg mb-5">
                    <div class="card-body">
                        <div class="row p-5">
                            <form role="Rechercher" class="col-lg-9">
                                <input class="form-control" type="search" placeholder="Rechercher"
                                    aria-label="Search" />
                            </form>
                            <div class="col-lg-3 ">
                                <button class="btn btn btn-primary w-100" data-bs-target="#commande"
                                    data-bs-toggle="modal">Nouvelle Commande</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                        <div class="card h-100 card-lg">
                            <!-- heading -->
                            <div class="row p-7">
                                <div class="col-lg-6 text-start">
                                    <h3 class="mb-0 fs-5">Régistre des Commandes</h3>
                                </div>
                                <div class="col-lg-5 justify-content-end">
                                    <ul class="nav nav-tabs card-header-tabs text-end m-3 " id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true"><strong>Commandes En
                                                    cours</strong></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false"><strong>Commandes
                                                    Livrées</strong></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab" tabindex="0">
                                        <!-- table -->
                                        <div class="table-responsive">
                                            <table
                                                class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
                                                <thead class="bg-light">
                                                    <tr class="text-center">
                                                        <th><strong>N°</strong></th>
                                                        <th><strong>Code</strong></th>
                                                        <th><strong>Produit</strong></th>
                                                        <th><strong>Fournisseur</strong></th>
                                                        <th><strong>Quantité</strong></th>
                                                        <th><strong>Prix Unitaire</strong></th>
                                                        <th><strong>Prix Total</strong></th>
                                                        <th><strong>Statut</strong></th>
                                                        <th><strong>Date & Heure de livraison</strong></th>
                                                        <th><strong>Actions</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td>01</td>
                                                        <td>###50</td>
                                                        <td>Biscuits</td>
                                                        <td>Dangote</td>
                                                        <td>25</td>
                                                        <td>25000</td>
                                                        <td>50000</td>
                                                        <td><button class="btn btn btn-primary">En
                                                                    cours</button>
                                                        </td>
                                                        <td>00/00/00## 00:25:32</td>
                                                        <td><div class="d-flex text-end">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#fournisseur"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="bi bi-pencil-square me-3"></i></a>
                                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="bi bi-trash me-3"></i></a>
                                                        </div></td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td>01</td>
                                                        <td>###50</td>
                                                        <td>Biscuits</td>
                                                        <td>Dangote</td>
                                                        <td>25</td>
                                                        <td>25000</td>
                                                        <td>50000</td>
                                                        <td><button class="btn btn btn-primary">En
                                                                    cours</button>
                                                        </td>
                                                        <td>00/00/00## 00:25:32</td>
                                                        <td><div class="d-flex text-end">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#fournisseur"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="bi bi-pencil-square me-3"></i></a>
                                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="bi bi-trash me-3"></i></a>
                                                        </div></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab" tabindex="0">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
                                                <thead class="bg-light">
                                                    <tr class="text-center">
                                                        <th><strong>N°</strong></th>
                                                        <th><strong>Code</strong></th>
                                                        <th><strong>Produit</strong></th>
                                                        <th><strong>Fournisseur</strong></th>
                                                        <th><strong>Quantité</strong></th>
                                                        <th><strong>Prix Unitaire</strong></th>
                                                        <th><strong>Prix Total</strong></th>
                                                        <th><strong>Statut</strong></th>
                                                        <th><strong>Date & Heure de livraison</strong></th>
                                                        <th><strong>Actions</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td>01</td>
                                                        <td>###50</td>
                                                        <td>Biscuits</td>
                                                        <td>Dangote</td>
                                                        <td>25</td>
                                                        <td>25000</td>
                                                        <td>50000</td>
                                                        <td><button class="btn btn btn-danger">Livrée</button>
                                                        </td>
                                                        <td>00/00/00## 00:25:32</td>
                                                        <td><div class="d-flex text-end">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#fournisseur"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="bi bi-pencil-square me-3"></i></a>
                                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="bi bi-trash me-3"></i></a>
                                                        </div></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <?php include('modal.php'); ?>
    <?php include('renouveller.php');?>
    <?php include('menu.php');?>
    <!-- Footer -->

    <!-- Javascript-->
    <!-- Libs JS -->
    <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>

    <script src="./assets/js/vendors/password.js"></script>

    <script src="./assets/js/vendors/validation.js"></script>
</body>

<!-- Mirrored from freshcart.codescandy.com/pages/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 14:40:32 GMT -->

</html>