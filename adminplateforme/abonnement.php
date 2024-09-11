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

//CHAMP SELECT TYPE ABONNEMENT
$sql1=$conn->prepare("SELECT*FROM type_abonnement ORDER BY date_ajout DESC");
$sql1->execute();

// CHAMP SELECT NOM SUPERMARCHE
$sql2=$conn->prepare("SELECT*FROM informationsm ORDER BY date_heure DESC");
$sql2->execute();

//TABLEAU AFFICHAGE
$sql3 = $conn->prepare("SELECT i.*,a.*,t.* FROM abonnement AS a JOIN type_abonnement AS t ON a.id_type_abonnement = t.id_type_abonnement JOIN informationsm AS i ON i.id=a.id ORDER BY a.date_abonnement DESC");
$sql3->execute();
?>

<!doctype html>
<html lang="en" data-theme="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

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
?>     

    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg scrollbar"
            id="sidebar">
            <div class="container-fluid"><button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> <a
                    class="navbar-brand d-inline-block py-lg-2 mb-lg-5 px-lg-6 me-0" href="index.html"><img
                        src="./img/logos/clever-primary.svg" alt="..."></a>
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="listesm.php"
                                data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebar-files"><i
                                    class="fas fa-home"></i> Supermarché</a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="typeAbonnement.php" data-bs-toggle="" role="button"
                                aria-expanded="false" aria-controls="sidebar-files"><i class="fas fa-solid fa-user-plus"></i>
                                Type Abonnement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="abonnement.php" data-bs-toggle=""
                                role="button" aria-expanded="false" aria-controls="sidebar-files"><i
                                    class="fas fa-user-check"></i> Abonnement</a>
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
                            <div class="col-sm col-12">
                                <h1 class="h2 ls-tight">Tableau de bord</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="vstack gap-6">
                        <div class="card mb-4">
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
                                    <button class="btn btn btn-primary btn-md" data-bs-target="#ajout"
                                        data-bs-toggle="modal">S'abonner</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h3><strong>Régistre des abonnements</strong></h3>
                                </div>
                                <div class="col-lg-3 justify-content-end">
                                    <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true"><strong>En
                                                    cours</strong></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile"
                                                aria-selected="false"><strong>Terminé</strong></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Nom du supermarché</th>
                                                    <th>Type d'abonnement</th>
                                                    <th>Date & Heure d'abonnement</th>
                                                    <th>Periode d'abonnement</th>
                                                    <th>Jours restants</th>
                                                    <th>Montant</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;
                                                    while($aff=$sql3->fetch()){  
                                                ?>
                                                <tr>
                                                    <td><strong><?php echo $i ?></strong></td>
                                                    <td><?php echo $aff['nom'] ?></td>
                                                    <td><?php echo $aff['type_abonnement'] ?></td>
                                                    <td><?php 
                                                    $date = new DateTime($aff['date_abonnement']);
                                                    echo $date -> format("d/m/Y H:i:s");   
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        
                                                        $nombre_jours_abonnement = $aff['nombre_jour']; // Nombre total de jours de l'abonnement
                                                        

                                                        $debut_abonnement = new DateTime($aff['date_abonnement'], $fuseau_horaire);// Date de début de l'abonnement

                                                        $fin_abonnement = $debut_abonnement->add(new DateInterval("P{$nombre_jours_abonnement}D"));// Date de fin de l'abonnement
                                                        $date_fin_abonnement = $fin_abonnement->format('d/m/Y');
                                                        $d_fin =$fin_abonnement->format('Y-m-d H:i:s');
                                                        

                                                         $requette = $conn->prepare("UPDATE abonnement SET date_fin_abonnement='$d_fin' WHERE id='$aff[id]'");
                                                         $requette->execute();
                                                            
                                                        ?>
                                                        Du <?php echo $date -> format("d/m/Y")?><br>
                                                        Au <?php echo $date_fin_abonnement ?>
                                                    </td>
                                                    <td><strong>
                                                            <span
                                                                class="badge rounded-pill bg-danger text-light-danger "><?php


                                                                    $nombre_jours_abonnement = $aff['nombre_jour']; // Nombre total de jours de l'abonnement


                                                                    $debut_abonnement = new DateTime($aff['date_abonnement'],$fuseau_horaire);

                                                                    $debut_abonnement->add(new DateInterval("P{$nombre_jours_abonnement}D"));

                                                                    $jour = $debut_abonnement -> format('Y-m-d H:i:s');

                                                                    $calcul_jour = new DateTime($jour,$fuseau_horaire);
                                                                    $temps = $date_actuelle->diff($calcul_jour);
                                                                    $mois = $temps->m;
                                                                    $jour = $temps->d;
                                                                    $heure = $temps->h;
                                                                    $minute = $temps->i;
                                                                    $secondes = $temps->s;
                                                                    echo $mois."mois ".$jour."jours   ".$heure.":".$minute.":".$secondes;
                                                               
                                                            
                                                                    ?>
                                                            </span>
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <?php echo $aff['montant'] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($aff['statut']==0){
                                                        ?>
                                                            <span class="badge rounded-pill bg-soft-success text-success ">
                                                            en cours
                                                            </span>
                                                        <?php
                                                            }else{
                                                        ?>
                                                            <span class="badge rounded-pill bg-soft-danger text-danger ">
                                                                terminé
                                                            </span>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#ajout<?php echo($aff['id_abonnement'] ) ?>"
                                                                class="btn btn-primary btn-sm shadow btn-xs sharp me-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                                    <a href="suprimerA.php?id_abonnement=<?php echo($aff['id_abonnement'] ) ?>" class="btn btn-danger btn-sm shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                   include("modifierA.php");
                                                    $i++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Nom du supermarché</th>
                                                    <th>Type d'abonnement</th>
                                                    <th>Date & Heure d'abonnement</th>
                                                    <th>Periode d'abonnement</th>
                                                    <th>Montant</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $o=1;
                                                    $archive=$conn->prepare("SELECT i.*,a.*,t.* FROM abonnement AS a JOIN type_abonnement AS t ON a.id_type_abonnement = t.id_type_abonnement JOIN informationsm AS i ON i.id=a.id  WHERE  a.date_fin_abonnement< CURRENT_DATE ");
                                                    $archive->execute();
                                                    while($terminer=$archive->fetch()){  
                                                ?>     
                                                <tr>
                                                    <td><strong><?php echo $o ?></strong></td>
                                                    <td><?php echo $archive['nom'] ?></td>
                                                    <td><?php $archive['type_abonnement'] ?></td>
                                                    <td><?php
                                                        $date1 = new DateTime($archive['date_abonnement']);
                                                        $date2 = new DateTime($archive['date_fin_abonnement']);
                                                        echo $date1 -> format("d/m/Y H:i:s"); 
                                                        ?>
                                                    </td>
                                                    <td>
                                                    Du <?php echo $date1 -> format("d/m/Y")?><br>
                                                    Au <?php echo $date2 -> format("d/m/Y")?>
                                                    </td>
                                                    <td>
                                                        <?php $archive['montant'] ?>
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-soft-danger text-danger ">
                                                            terminé
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php
                                                $o++;
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
            </main>
        </div>
    </div>
    <!--MODAL DES ABONNEMENTS-->
    <div class="modal fade" id="ajout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-3" id="exampleModalLabel">S'abonner</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="traittementA.php">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="fullname" class="col-form-label">Supermarché</label>
                                        <select class="form-control wide" name="id" id="">
                                            <option value="aucun">aucun </option>
                                            <?php
                                                while($afficher = $sql2->fetch()){
                                            ?>
                                            <option value="<?php echo $afficher["id"]?>"><?php echo $afficher["nom"]?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Type d'Abonnement</label>
                                        <select class="form-control wide" name="id_type_abonnement" id="">
                                            <option value="aucun">aucun </option>
                                            <?php
                                                while($affiche = $sql1->fetch()){   
                                            ?>
                                            <option value="<?php echo $affiche['id_type_abonnement']?>"><?php echo $affiche['type_abonnement']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
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