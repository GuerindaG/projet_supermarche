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
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from freshcart.codescandy.com/dashboard/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 14:40:37 GMT -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta content="Codescandy" name="author">
	<title>Dashboard eCommerce HTML Template - FreshCart</title>
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

</head>

<body>
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
								<a class="nav-link active" href="vente.php">
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
								<a class="nav-link " href="../Supermarche/pages/marche.html">
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
									<button class="btn btn btn-primary w-100" data-bs-target="#vente"
										data-bs-toggle="modal">Nouvelle vente</button>
								</div>
							</div>
						</div>
					</div>
					<!-- row -->
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
							<div class="card h-100 card-lg">
								<!-- heading -->
								<div class="row">
									<div class="col-lg-5">
										<div class="p-6">
											<h3 class="mb-0 fs-5">Gestion Des Ventes</h3>
										</div>
									</div>
									<div class="mb-3 col-lg-3">
										<div class="p-6">
											<input type="date" class="form-control flatpickr"
												placeholder="Selectionnez une Date" />
										</div>
									</div>
									<div class="col-lg-1 text-center p-2">
										<div class="p-6"><p>&</p></div>
									</div>
									<div class="mb-3 col-lg-3">
										<div class="p-6">
											<input type="date" class="form-control flatpickr"
												placeholder="Selectionnez une Période" />
										</div>
									</div>
								</div>
								<div class="card-body p-0">
									<!-- table -->
									<div class="table-responsive">
										<table
											class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
											<thead class="bg-light">
												<tr class="text-center">
													<th><strong>N°</th></strong>
													<th>Catégories/Rayons</th>
													<th><strong>Produits</th></strong>
													<th><strong>Quantités</th></strong>
													<th><strong>Prix unitaire</th></strong>
													<th><strong>Prix total</th></strong>
													<th><strong>Date d'achat</th></strong>
													<th><strong></th></strong>
													<th><strong>Actions</th></strong>
												</tr>
											</thead>
											<tbody>
												<?php
													$requette=$connexion->prepare("SELECT p.*,r.*,v.* FROM vente AS v INNER JOIN produit AS p ON p.id_prod=v.id_prod INNER JOIN rayon AS r ON r.id_rayon=v.id_rayon   ORDER BY date_vente DESC");
													$requette->execute();
													$i=1;
													while($afficher=$requette->fetch()){
														
												?>
												<tr class="text-center">
													<td><?php echo $i ?></td>
													<td><?php echo $afficher['nomR'] ?></td>
													<td><?php echo $afficher['designation'] ?> </td>
													<td><span
															class="badge bg-light-primary text-primary" data-bs-target="#hist-vente<?php echo $afficher['id_prod'] ?>" data-bs-toggle="modal"><strong><?php echo $afficher['quantite'] ?></strong></span>
													</td>
													<td><?php echo $afficher['prix_vente'] ?></td>
													<td><?php 
														$total = $afficher['prix_vente']* $afficher['quantite'];
														echo $total;
														?></td>
													<td>
													<?php echo $afficher['date_vente'] ?>
													</td>
													<td></td>
													<td>
														<div class="d-flex text-end">
															<a href="#" data-bs-toggle="modal" data-bs-target="#vente"
																class="btn btn-primary shadow btn-xs sharp me-1"><i
																	class="bi bi-pencil-square me-3"></i></a>
															<a href="#" class="btn btn-danger shadow btn-xs sharp"><i
																	class="bi bi-trash me-3"></i></a>
														</div>
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
				</section>
			</main>
		</div>
	</div>
	
	<?php include('modal.php'); ?>
	<?php include('renouveller.php');?>
	<?php include('menu.php');?>

	<!--MODAL DES ABONNEMENTS-->
	<div class="modal fade " id="abonnement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title fs-3" id="exampleModalLabel">S'abonner</h3>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="card-body">
								<form class="needs-validation" novalidate method="POST" action="..\adminplateforme\traittementA.php">
									<div class="row">
										<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
										<div class="col-lg-12">
											<div class="mb-3">
												<label for="recipient-name" class="col-form-label">Type d'Abonnement</label>
												<select class="form-control wide" name="id_type_abonnement" id="">
													<option value="aucun">aucun </option>
													<?php
														$reqt = $connexion->prepare("SELECT*FROM type_abonnement");
														$reqt->execute();
														while($afff = $reqt->fetch()){
													?>
														<option value="<?php echo $afff['id_type_abonnement'] ?>"><?php echo $afff['type_abonnement'] ?></option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-12 text-end">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULER</button>
										<button type="submit" name="valide" class="btn btn-primary">SOUMETTRE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
	<!--MODAL MESSAGE 1-->
	<?php
		if($_SESSION['etat']==false AND !isset($_SESSION['show']) AND $_SESSION['heure_fin'] !==NULL){
			$_SESSION['show'] =true;
	?>
	<div class="modal fade  " id="msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="card-body p-6">
						
							<h5>Vous avez <span id="timer"></span> de navigation gratuite sur la plateforme avant l'abonnement</h5>
							
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-bs-dismiss="modal" aria-label="Close" onClick="fermermodal();" class="btn btn-primary w-100">OK</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			modals = document.getElementById('msg');
			if(modals){
				afficheModal = new bootstrap.Modal(modals);
				afficheModal.show();
			}

		});
	</script>
	<?php
		}
	?>
	
	<!--MODAL MESSAGE 5min -->
	<div class="modal fade  " id="message" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
						<p>
							<h4>Voulez-vous vous abonnez?</h4>
						</p>
				</div>
				<div class=" modal-footer">
					<div class="row">
						<div class="col-lg-6 text-center"><button type="button" data-bs-dismiss="modal" onClick="fermermod();" class="btn btn-danger">Non</button></div>
						<div class="col-lg-6 text-center"><button type="button" data-bs-target="#abonnement" onClick="fermermod();" data-bs-toggle="modal" class="btn btn-primary">Oui</button></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--MODAL VENTE-->
	<div class="modal fade" id="vente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<form method="POST" action="traittementC.php">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle Vente</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row mb-2">
							<div class="col-sm-12">
								<label for="recipient-name" class="col-form-label">Nom et Prénom du Client</label>
								<input type="text" name="nom" placeholder="Nom & Prénom du client (Facultatif)"
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
						<div class="row mb-2">
							<div class="col-lg-6">
								<label for="recipient-name" class="col-form-label">Nom du Rayon</label>
								<select class="form-control wide" name="id_rayon" >
										<?php
											$show = $connexion->prepare("SELECT*FROM rayon");
											$show->execute();
											while($see=$show->fetch()){
										?>
										<option value="<?php echo $see['id_rayon'] ?>"><?php echo $see['nomR'] ?> </option>
										<?php
											}
										?>
									</select>
							</div>
							<div class="col-lg-6">
								<label for="recipient-name" class="col-form-label">Produit</label>
								<select class="form-control wide" name="id_prod" >
										<?php
											$shown = $connexion->prepare("SELECT*FROM produit");
											$shown->execute();
											while($seee=$shown->fetch()){
										?>
										<option value="<?php echo $seee['id_prod'] ?>"><?php echo $seee['designation'] ?> </option>
										<?php
											}
										?>
									</select>
							</div>
							<div class="col-sm-12">
								<label for="recipient-name" class="col-form-label">Quantités</label>
								<input type="number" name="quantite" placeholder="" class="form-control pop">
							</div>
						</div>
						<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary">Enregistrer</button>
			</div>
				</form>
			</div>
			
		</div>
	</div>
	</div>

	<!--MODAL HISTORIQUE DES VENTES-->
	<?php
		$requette1=$connexion->prepare("SELECT*FROM produit");
		$requette1->execute();
		while($vue=$requette1->fetch()){
	?>
	<div class="modal fade" id="hist-vente<?php echo $vue['id_prod'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-3" id="exampleModalLabel">Historique de vente du produit <?php echo $vue['code'] ?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table
							class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
							<thead class="table-light">
								<tr class="text-center">
									<th scope="col">N°</th>
									<th scope="col">Référence</th>
									<th scope="col">Quantités</th>
									<th scope="col">Date & Heure d'Achat</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$requette2=$connexion->prepare("SELECT*FROM vente");
								$requette2->execute();
								while($vue=$requette1->fetch()){
							?>
								<tr class="text-center">
									<td>01</td>
									<td>
										Nom du Client 
									</td>
									<td>
										456
									</td>
									<td>00/00/20## <br>
										00:00:00
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
	<?php
		}
	?>

	<!-- Libs JS -->
	<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
	<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>

	<!-- Theme JS -->
	<script src="./assets/js/theme.min.js"></script>

	<script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="./assets/js/vendors/chart.js"></script>
	<script src="./assets/libs/flatpickr/dist/flatpickr.min.js"></script>

</body>

<!-- Mirrored from freshcart.codescandy.com/dashboard/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 14:40:43 GMT -->

</html>