<?php
include('connexion.php');
session_start();

// Empêcher la mise en cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php"); // Redirige vers la page de connexion
    exit();
}

//AFFICHAGE DU TABLEAU
$sql = $conn->prepare("SELECT*FROM `informationsm` ORDER BY date_heure DESC");
$sql->execute();

//DATETIME
$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);

//HISTORIQUE DES ABONNEMENTS
$hist = $conn->prepare("SELECT*FROM informationsm");
$hist->execute();

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
    <title>Tableau de bord-Gestion des supermarchés</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/utilities.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css">
    <script defer="defer" data-domain="webpixels.works" src="../../../plausible.io/js/script.js"></script>
    <link rel="stylesheet" href="asset/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <li class="nav-item"><a class="nav-link active" href="listesm.php" data-bs-toggle=""
                                role="button" aria-expanded="false" aria-controls="sidebar-files"><i
                                    class="fas fa-home"></i>
                                Supermarché</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="typeAbonnement.php" data-bs-toggle="" role="button"
                                aria-expanded="false" aria-controls="sidebar-files"><i class="fas fa-solid fa-user-plus"></i>
                                Type Abonnement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="abonnement.php"
                                data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebar-files"><i
                                    class="fas fa-user-check"></i> Abonnement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="utilisation.php"
                                data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebar-files"><i
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
                                <div class="col lg-10">
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control rounded" type="search"
                                                placeholder="Rechercher" />
                                            <span class="input-group-append"></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2 text-end">
                                    <button class="btn btn btn-primary" data-bs-target="#sm"
                                        data-bs-toggle="modal">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-nowrap">
                                        <thead class="table-light">
                                            <tr class="text-center">
                                                <th>N°</th>
                                                <th>Supermarché/Identifiant</th>
                                                <th>Logo</th>
                                                <th>IFU/RCCM</th>
                                                <th>Email/Contact</th>
                                                <th>Site web</th>
                                                <th>Localisation</th>
                                                <th>Longitude</th>
                                                <th>Latitude</th>
                                                <th>Heure d'ouverture</th>
                                                <th>Heure de fermeture</th>
                                                <th>Historique</th>
                                                <th>Compte</th>
                                                <th>Statut</th>
                                                <th>Date & Heure</th>
                                                <!--th>Actions</th-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                while($aff=$sql->fetch()){
                                            ?>
                                            <tr class="text-start">
                                                <td>
                                                    <strong><?php echo $i ?></strong>
                                                </td>
                                                <td><a
                                                        href="../supermarche/pages\marche.html"><?php echo $aff['nom']?></a>
                                                        <br>
                                                        <?php echo $aff['identifiant'] ?>
                                                </td>
                                                <td>
                                                <img src="../supermarche/<?php echo $aff['logo'] ?>" alt=""
                                                    class="avatar avatar-sm rounded-circle me-2 ">
                                                </td>
                                                <td>
                                                    <?php echo $aff['ifu'] ?> <br>
                                                    <?php echo $aff['rccm'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $aff['email'] ?> <br>
                                                    <?php echo $aff['contact'] ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $aff['siteweb'] ?>">Voir le site</a>
                                                </td>
                                                <td>
                                                    <?php echo $aff['localisation'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $aff['longitude'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $aff['latitude'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $aff['ouverture'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $aff['fermeture'] ?>
                                                </td>
                                                <td>
                                                    <span class="badge rounded-pill bg-soft-success text-success"
                                                        data-bs-target="#historique<?php echo $aff['id'] ?>" data-bs-toggle="modal">
                                                        
                                                        <?php
															$nombre=$conn->prepare("SELECT COUNT(a.id_abonnement) AS nombre , i.* FROM abonnement AS a INNER JOIN informationsm AS i ON i.id=a.id WHERE i.id='$aff[id]'");
                                                            $nombre->execute();
															$am= $nombre->fetch();
															echo $am["nombre"];
														?>

                                                    </span>
                                                </td>
                                                <td> 
                                                <?php
                                                if($aff["compte"]==0){?>
                                                    <button class='btn btn-sm btn btn-success' data-bs-toggle="modal" data-bs-target="#verif<?php echo $aff['id'] ?>" >PRIVÉ</button>
                                                <?php
                                                }else{
                                                    ?><button class="btn btn-sm btn btn-danger">PUBLIC</button>
                                                <?php
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if( $aff['statut'] == 0){
                                                    ?>
                                                    <span class="badge rounded-pill bg-soft-primary text-primary ">
                                                        Activé
                                                    </span>
                                                    <?php
                                                        }else{
                                                    ?>
                                                        <span class="badge rounded-pill bg-soft-danger text-danger ">
                                                            Désactivé
                                                        </span>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $date = new DateTime( $aff['date_heure'],$fuseau_horaire);
                                                        echo $date-> format('d/m/Y H:i:s')
                                                    ?>
                                                </td>
                                                <!--td>
                                                    <div class="d-flex">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#sm<?php// echo $aff['id'] ?>"
                                                            class="btn btn-primary btn-sm shadow btn-xs sharp me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a href="suprimer.php?id=<?php// echo $aff['id'] ?>" class="btn btn-danger btn-sm shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td-->
                                            </tr>
                                            <?php
                                           // include('modification.php');
                                                $i++;
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

<!-- Modal VERIFICATION-->
            <?php 
                $req = $conn->prepare("SELECT*FROM informationsm ");
                $req->execute();
                while($voir = $req->fetch()){           
            ?>
    <div class="modal fade" id="verif<?php echo $voir['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<form method="POST" action="">
					<div class="modal-body">
						<div class="row mb-5 text-center">
							<h4>Voulez-vous rendre public le compte de <?php echo $voir['nom'] ?>?</h4>
						</div>
			        </div>
                    <div class="modal-footer ">
				        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Non</button>
				        <a href='public.php?id=<?php echo $voir['id'] ?>'><button type="button"  class="btn btn-sm btn-primary">Oui</button></a></div>
				</form>
			</div>
		</div>
	</div>
    <?php
            };
    ?>

    <!--MODAL-->
    <div class="modal fade" id="sm" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <form class="needs-validation" method="POST" action="../supermarche/traittementInscriptionSm" novalidate enctype="multipart/form-data" >
                <div class="modal-content p-4">
                    <div class="modal-body">
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
                                    <input type="number" class="form-control" name="rccm" placeholder="Entrez votre RCCM"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Entrez votre email"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="number" class="form-label">Contact</label>
                                    <input type="tel" class="form-control" name="contact"
                                        placeholder="Entrez votre contact" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="url" class="form-label">Site Web</label>
                                    <input type="url" class="form-control" name="siteweb"
                                        placeholder="Entrez votre contact" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="fulltext" class="form-label">Localisation</label>
                                    <input type="text" class="form-control" name="localisation"
                                        placeholder="Entrez votre localisation" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="recipient-name" class="col-form-label">Logo du supermarché</label>
                                <input type="file" name="logo" placeholder="Choisir votre Logo" class="form-control pop">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer  text-end">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary w-100">ANNULER</button>
                        <button type="submit" name="enregistrer" class="btn btn-primary w-100">SOUMETTRE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    

    <!--MODAL HISTORIQUE DES ABONNEMENT-->
    <?php while($voir = $hist->fetch()){ ?>
    <div class="modal fade" id="historique<?php echo $voir["id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-3" id="exampleModalLabel">Historique des abonnements : <?php echo $voir["nom"]?></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Type d'abonnement</th>
                                        <th scope="col">Date d'abonnement</th>
                                        <th scope="col">Période d'abonnement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        //TABLEAU HISTORIQUE
                                        $sql3 = $conn->prepare("SELECT i.*,a.*,t.* FROM abonnement AS a JOIN type_abonnement AS t ON a.id_type_abonnement = t.id_type_abonnement JOIN informationsm AS i ON i.id=a.id WHERE a.id='$voir[id]' ORDER BY a.date_abonnement DESC");
                                        $sql3->execute();
                                        $a=1;
                                        while($affichage = $sql3->fetch()){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $a ?>
                                        </td>
                                        <td>
                                        <?php echo $affichage['type_abonnement'] ?>
                                        </td>
                                        <td>
                                            <?php $date = new DateTime($affichage['date_abonnement']);
                                                    echo $date -> format("d/m/Y H:i:s");  ?>
                                        </td>
                                        <td>
                                            <?php
                                                // Date d'abonnement (au format anglais)
                                                $dateAbonnement = new DateTime($affichage['date_fin_abonnement']);
                                                // Convertir le timestamp de fin en date lisible
                                                $dateF = $dateAbonnement -> format("d/m/Y ");
                                            ?>
                                            Du <?php echo $date -> format("d/m/Y")?> <br>
                                            Au <?php echo $dateF ?>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <script src="js/main.js"></script>
</body>

</html>