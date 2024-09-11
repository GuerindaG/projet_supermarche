<?php
session_start();

// Empêcher la mise en cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php"); // Redirige vers la page de connexion
    exit();
}
?>

<!doctype html>
<html lang="en" data-theme="light">
<!-- Mirrored from clever.webpixels.io/pages/files/table-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 May 2024 13:31:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>Clever Dashboard | Made by Webpixels</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/utilities.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css">
    <script defer="defer" data-domain="webpixels.works" src="../../../plausible.io/js/script.js"></script>
    <link rel="stylesheet" href="asset/css/all.css">
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg scrollbar"
            id="sidebar">
            <div class="container-fluid"><button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> <a
                    class="navbar-brand d-inline-block py-lg-2 mb-lg-5 px-lg-6 me-0" href="index.html"><img
                        src="img/logos/clever-primary.svg" alt="..."></a>
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link " href="listesm.php"
                                data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebar-files"><i
                                    class="fas fa-home"></i>
                                Supermarché</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="abonnement.php" data-bs-toggle="" role="button"
                                aria-expanded="false" aria-controls="sidebar-files"><i class="fas fa-solid fa-user-plus"></i>
                                Type Abonnement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="abonnement.php" data-bs-toggle="" role="button"
                                aria-expanded="false" aria-controls="sidebar-files"><i class="fas fa-user-check"></i>
                                Abonnement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="utilisation.php" data-bs-toggle=""
                                role="button" aria-expanded="false" aria-controls="sidebar-files"><i
                                    class="fas fa-chart-line"></i> Historique d'Utilisation</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <a href="deconnexion.php"><button class="btn btn btn-primary">DECONNEXION</button></a>
           </div>
        </nav>
        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            <header>
                <div class="container-fluid">
                    <div class="border-bottom pt-6">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12 mb-4 mb-sm-0">
                                <h1 class="h2 ls-tight">Tableau de bord</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="vstack gap-6">

                        <div class="card">
                            <div class="row p-5">
                                <div class="col col-lg-12">
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control rounded" type="search"
                                                placeholder="Rechercher" />
                                            <span class="input-group-append"></span>
                                        </div>
                                    </form>
                                </div>
                                <!--div class="col-lg-2 text-end">
                                    <button class="btn btn btn-primary" data-bs-target="#sm"
                                        data-bs-toggle="modal">Ajouter</button>
                                </div-->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th>N°</th>
                                                <th>Nom du supermarché</th>
                                                <th>Utilisateurs</th>
                                                <th>Actions</th>
                                                <th>Date & Heure</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>01</strong>
                                                </td>
                                                <td>Erevan
                                                </td>
                                                <td>
                                                    user02015
                                                </td>
                                                <td>
                                                    <strong><span class="badge rounded-pill bg-soft-primary text-primary"
                                                    data-bs-target="#action" data-bs-toggle="modal">
                                                    01
                                                </span></strong>
                                                </td>
                                                <td>
                                                    00/00/00## <br>
                                                    23:25:02
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>02</strong>
                                                </td>
                                                <td>Erevan
                                                </td>
                                                <td>
                                                    user02015
                                                </td>
                                                <td>
                                                    <strong><span class="badge rounded-pill bg-soft-primary text-primary"
                                                    data-bs-target="#action" data-bs-toggle="modal">
                                                    03
                                                </span></strong>
                                                </td>
                                                <td>
                                                    00/00/00## <br>
                                                    23:25:02
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!--MODAL HISTORIQUE DES UTISATEURS-->
    <div class="modal fade" id="action" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-3" id="exampleModalLabel">Historique des actions</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>N°</th>
                                            <th>Action</th>
                                            <th>Adresse IP</th>
                                            <th>Date & Heure</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>01</strong>
                                            </td>
                                            <td>Visite
                                            </td>
                                            <td>
                                                127.00.00.01
                                            </td>
                                            
                                            <td>
                                                00/00/00## <br>
                                                23:25:02
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>02</strong>
                                            </td>
                                            <td>Visite
                                            </td>
                                            <td>
                                                127.00.00.01
                                            </td>
                                            
                                            <td>
                                                00/00/00## <br>
                                                23:25:02
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>