<?php
session_start();
include('connexion.php'); 
$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);
// Empêcher la mise en cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php"); // Redirige vers la page de connexion
    exit();
}

$requette = $connexion->prepare("SELECT * FROM client");
$requette->execute();

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from freshcart.codescandy.com/dashboard/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 14:40:37 GMT -->

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
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() {
			dataLayer.push(arguments);
		}
		gtag("js", new Date());

		gtag("config", "G-M8S4MT3EYG");
	</script>
	<!-- SweetAlert Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" rel="stylesheet">

</head>

<body>
<?php
if (!empty($success)) {
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        swal("Reussi", "<?php echo $success; ?>", "success");
    </script>
<?php
}
if (!empty($error)) {
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        swal("Attention", "<?php echo $error; ?>", "error");
    </script>
<?php
}
?>
	<!-- main -->
	<div>
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
						<a href="index.php" class="navbar-brand">
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
								<a class="nav-link   " href="categories.php">
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
								<a class="nav-link active " href="clients.php">
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
			<!-- main wrapper -->
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
									<button class="btn btn btn-primary w-100" data-bs-target="#client"
										data-bs-toggle="modal">Nouveau Client</button>
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
									<h3 class="mb-0 fs-5">Clientèle</h3>
								</div>
								<div class="card-body p-0">
									<!-- table -->
									<div class="table-responsive">
										<table
											class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
											<thead class="bg-light">
												<tr class="text-center">
													<th><strong>N°</strong></th>
													<th><strong>Nom & Prénom</strong></th>
													<th><strong>Contact</strong></th>
													<th><strong>Jour de naissance</strong></th>
													<th><strong>Achats</strong></th>
													<th><strong>Badge de fidélité</strong></th>
													<th><strong>Dates & Heure d'achat</strong></th>
												</tr>
											</thead>
											<tbody>
												<?php
													while($affichage=$requette->fetch()){
												?>
												<tr class="text-center">
													<td>01</td>
													<td><?php echo $affichage['nom'] ?></td>
													<td><?php echo $affichage['contact'] ?></td>
													<td><?php   $calcul = new DateTime($affichage['naissance'],$fuseau_horaire); 
																echo $calcul->format('d/m/Y');
													?></td>
													<td><span class="badge bg-dark-warning text-light-warning"
															data-bs-toggle="modal"
															data-bs-target="#cli-achat"><strong>01</strong></span></td>
													<td><span
															class="badge bg-dark-primary text-light-primary"><strong>BADGE</strong></span>
													</td>
													<td><?php   $calcul = new DateTime($affichage['date_ajout'],$fuseau_horaire); 
																echo $calcul->format('d/m/Y H:i:s');
													?></td>
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
				</section>
			</main>
		</div>
		<?php include('modal.php'); ?>
		<?php include('renouveller.php');?>
		<?php include('menu.php');?>
		<!--  -->
		<!--MODAL Clients-->
		<div class="modal fade" id="ref" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-3" id="exampleModalLabel">Historique d'Achat</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table
								class="table table-bordered table-responsive-md table-centered table-borderless text-nowrap table-hover">
								<thead class="table-light">
									<tr class="text-center">
										<th scope="col">N°</th>
										<th scope="col">Catégories/Rayons</th>
										<th scope="col">Produits</th>
										<th scope="col">Quantités</th>
										<th scope="col">Prix Unitaire</th>
										<th scope="col">Prix Total</th>
										<th scope="col">Date & Heure d'achat</th>
									</tr>
								</thead>
								<tbody>
									<tr class="text-center">
										<td>01</td>
										<td>
											rayon 1
										</td>
										<td>
											biscuits
										</td>
										<td>
											05
										</td>
										<td>
											12345FCFA
										</td>
										<td>
											4568596FCFA
										</td>
										<td>
											00/00/00## <br>
											00:00:00
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--MODAL-->
		<div class="modal fade" id="cli-achat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-3" id="exampleModalLabel">Achats</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table
								class="table table-responsive-md table-centered table-borderless text-nowrap table-hover table-bordered">
								<thead class="table-light">
									<tr class="text-center">
										<th scope="col">N°</th>
										<th scope="col">Référence</th>
										<th scope="col">Nombre de Produits</th>
										<th scope="col">Prix Total</th>
										<th scope="col">Date & Heure d'achat</th>
									</tr>
								</thead>
								<tbody>
									<tr class="text-center">
										<td>01</td>
										<td>
											dadayid:56699
										</td>
										<td>
											<span class="badge bg-dark-info text-light-info" data-bs-toggle="modal"
												data-bs-target="#ref"><strong>2015</strong></span>
										</td>
										<td>
											12345FCFA
										</td>
										<td>
											00/00/00## 00:00:00
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--MODAL CLIENTS-ACHATS-->
		<!-- <div class="modal fade" id="client" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<form method="POST" action="traittementC.php">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un Client</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row mb-2">
								<div class="col-sm-12">
									<label for="recipient-name" class="col-form-label">Nom</label>
									<input type="text" placeholder="Entrez votre prénom" name="nom"
										class="form-control pop">
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-sm-4">
									<label for="recipient-name" class="col-form-label">Contact</label>
									<input type="tel" placeholder="Entrez votre contact" name="contact"
										class="form-control pop">
								</div>
								<div class="col-sm-8">
									<label for="recipient-name" class="col-form-label">Jour de naissance</label>
									<input type="date" placeholder="Entrez votre jour de naissance" name="naissance"
										class="form-control pop">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
							<button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
					</form>
				</div>
			</div>
		</div> -->
	</div>
	<!-- Libs JS -->
	<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
	<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>

	<!-- Theme JS -->
	<script src="./assets/js/theme.min.js"></script>

	<script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="./assets/js/vendors/chart.js"></script>
</body>

<!-- Mirrored from freshcart.codescandy.com/dashboard/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 14:40:43 GMT -->

</html>