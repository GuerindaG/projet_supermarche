<?php
session_start();
include('connexion.php');
// Empêcher la mise en cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php"); // Redirige vers la page de connexion
    exit();
}

// Vérification de la soumission du formulaire
if(isset($_POST['nomR'], $_POST['id'])) {
    // Vérification que les champs ne sont pas vides
    if(!empty($_POST['nomR']) && !empty($_POST['id'])) {
        // Nettoyage et récupération des données du formulaire
        $nomR = htmlspecialchars(trim($_POST['nomR']));
        $id = $_POST['id'];

        // Préparation de la requête SQL avec une requête préparée
        $req = $connexion->prepare("INSERT INTO rayon (id, nomR) VALUES (?, ?)");
        $req->execute([$id, $nomR]);

        // Message de succès
        $succes = "Rayon ajouté avec succès !";
    } else {
        // Message d'erreur si des champs sont vides
        $erreur = "Veuillez remplir tous les champs.";
    }
}
//AFFICHAGE
$sql = $connexion->prepare("SELECT DISTINCT rayon.*, informationsm.* FROM rayon INNER JOIN informationsm ON rayon.id = informationsm.id WHERE rayon.id = ?");
$sql->execute([$_SESSION['id']]);

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
	<title>Gestion de supermarchés</title>
	<!-- Favicon icon-->
	<link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico">


	<!-- Libs CSS -->
	<link href="./assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
	<link href="./assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
	<link href="./assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./asset/css/all.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="./assets/css/theme.min.css">
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

</head>

<body>
<?php
               if (isset($erreur)) {
?>
                <script type='text/javascript'>
                    Swal.fire({
                    icon: "error",
                    text: "<?php echo addslashes($erreur); ?>",
                    });
                </script>
<?php
              
}if(isset($succes)){
    ?> 
                    <script type='text/javascript'>
                        Swal.fire({
                            text: "<?php echo addslashes($succes); ?>",
                            icon: 'success'
                    });</script>    
<?php 
}
?>    
	<!-- main wrapper -->
	<!-- navbar -->
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
		<!-- navbar vertical -->
		<!-- navbar -->
		<nav class="navbar-vertical-nav d-none d-xl-block">
			<div class="navbar-vertical">
				<div class="px-4 py-5">
					<a href="./index.php" class="navbar-brand">
						<img src="./assets/images/logo/freshcart-logo.svg" alt="" />
					</a>
				</div>
				<div class="navbar-vertical-content flex-grow-1" data-simplebar="">
					<ul class="navbar-nav flex-column" id="sideNavbar">
						<li class="nav-item">
							<a class="nav-link   " href="dashbord.php">
								<div class="d-flex align-items-center">
									<span class="nav-link-icon"><i class="fa bi-house"></i></span>
									<span class="nav-link-text">Stockage</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active  " href="categories.php">
								<div class="d-flex align-items-center">
									<span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
									<span class="nav-link-text">Rayons</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
                            <a class="nav-link " href="commande.php">
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
							<a class="nav-link  " href="caisse.php">
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
		<!-- main -->
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
								<button class="btn btn btn-primary w-100" data-bs-target="#rayon"
									data-bs-toggle="modal">Ajouter un Rayon</button>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
						<div class="card h-100 card-lg">
							<!-- heading -->
							<div class="p-6">
								<h3 class="mb-0 fs-5">Rayons</h3>
							</div>
							<div class="card-body p-0">
								<!-- table -->
								<div class="table-responsive">
									<table
										class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
										<thead class="bg-light">
											<tr>
												<th>N°</th>
												<th>Nom du Rayon</th>
												<th>Date & Heure d'enregistrement</th>
												<th colspan>Actions</th>
											</tr>
										</thead>
										<tbody>
												<?php
												$a=1;
													while($voir = $sql->fetch(PDO::FETCH_ASSOC)){
												?>
											<tr class="">
												
												<td><?php echo $a ?></td>
												<td><?php echo $voir['nomR'] ?></td>
												<td><?php
													$date = new DateTime($voir['date_heure']);
                                                    echo $date -> format("d/m/Y H:i:s");   ?>
												</td>
												<td>
													<div class="">
														<a href="#" data-bs-toggle="modal" data-bs-target="#rayon<?php echo $voir['id_rayon'] ?>"
															class="btn btn-primary shadow btn-xs sharp me-1"><i
																class="bi bi-pencil-square "></i></a>
														<a href="supR.php?id_rayon=<?php echo $voir['id_rayon'] ?>" class="btn btn-danger shadow btn-xs sharp"><i
																class="bi bi-trash "></i></a>
													</div>
												</td>
											</tr>
											<?php
											include("modifierR.php");
											$a++;
													}
												?>
										</tbody>
									</table>
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
	<div class="modal fade" id="rayon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<form method="POST" action="">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un rayon</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row mb-2">
							<input type="hidden" name='id' value="<?php echo $_SESSION['id']?>">
							<div class="col-lg-12">
								<label for="recipient-name" class="col-form-label">Nom du Rayon</label>
								<input type="text" name="nomR" placeholder="Nom du rayon" class="form-control pop">
							</div>
						</div>
						<div class="text-end">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
				<button type="submit"  class="btn btn-primary">Enregistrer</button>
			</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Libs JS -->
	<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
	<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>

	<!-- Theme JS -->
	<script src="./assets/js/theme.min.js"></script>

</body>

<!-- Mirrored from freshcart.codescandy.com/dashboard/categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 May 2024 07:33:40 GMT -->

</html>