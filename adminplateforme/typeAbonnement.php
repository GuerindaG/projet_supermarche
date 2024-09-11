<?php
include("connexion.php");
session_start();

// Empêcher la mise en cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php"); // Redirige vers la page de connexion
    exit();
}

//DATETIME
$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);
//AFFICHAGE
$sql = $conn->prepare("SELECT*FROM type_abonnement ORDER BY date_ajout DESC");
$sql->execute();

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
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<body>
<!-- <?php
               if (isset($_SESSION['error'])) {
?>
                <script type='text/javascript'>
                    Swal.fire({
                    icon: "error",
                    text: "<?php echo addslashes($_SESSION['error']); ?>",
                    });
                </script>
<?php
                unset($_SESSION['error']);
}if(isset($_SESSION['message'])){
    ?>
                    <script type='text/javascript'>
                        Swal.fire({
                            text: "<?php echo addslashes($_SESSION['message']); ?>",
                            icon: 'success'
                    });</script>    
                    <?php unset($_SESSION['message']);
    

}
?>     -->
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
                        <li class="nav-item"><a class="nav-link active " href="typeAbonnement.php" data-bs-toggle="" role="button"
                                aria-expanded="false" aria-controls="sidebar-files"><i class="fas fa-solid fa-user-plus"></i>
                                Type Abonnement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="abonnement.php" data-bs-toggle="" role="button"
                                aria-expanded="false" aria-controls="sidebar-files"><i class="fas fa-user-check"></i>
                                Abonnement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="utilisation.php" data-bs-toggle=""
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
                                <div class="col col-lg-8">
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control rounded" type="search"
                                                placeholder="Rechercher" />
                                            <span class="input-group-append"></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <button class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#type">Ajouter un type d'abonnement</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-hover table-nowrap table-bordered">
                                    <thead class="table-light">
                                        <tr class="text-center">
                                            <th>N°</th>
                                            <th>Type d'Abonnement</th>
                                            <th>Nombre de Mois</th>
                                            <th>Montant</th>
                                            <th>Date & Heure d'enregistrement</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            while($affichage = $sql->fetch()){
                                        ?>
                                        <tr class="text-center">
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $affichage['type_abonnement'] ?></td>
                                            <td><?php echo $affichage['nombre_jour']?></td>
                                            <td><?php echo $affichage['montant']?></td>
                                            <td><?php $date = new DateTime($affichage['date_ajout']);
                                                    echo $date -> format("d/m/Y H:i:s");?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#type<?php echo $affichage['id_type_abonnement']?>"
                                                        class="btn btn-primary btn-sm shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="suprimerT.php?id_type_abonnement=<?php echo($affichage['id_type_abonnement'])?>" class="btn btn-sm btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            $i++;
                                            include("modifierT.php");
                                            
                                            }
                                        ?>
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

    <!--MODAL TYPE ABONNEMENT-->
<div class="modal" id="type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-3" id="exampleModalLabel">Ajouter un Type d'Abonnement</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="traittementType.php" method="POST" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="fullname" class="col-form-label">Type d'Abonnement</label>
                                    <input type="text" class="form-control" id="" name="type_abonnement"
                                        placeholder="Entrez le type d'Abonnement" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fullname" class="col-form-label">Nombre de jour</label>
                                    <input type="number" class="form-control" id="" name="nombre_jour"
                                        placeholder="Entrez le nombre de Mois" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fullname" class="col-form-label">Montant</label>
                                    <input type="number" class="form-control" id="" name="montant"
                                        placeholder="Entrez le montant" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULER</button>
                            <button type="submit" class="btn btn-primary">SOUMETTRE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="js/main.js"></script>
</body>

</html>