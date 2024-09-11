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
								<a class="nav-link active " href="caisse.php">
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
								<form role="Rechercher" class="col-lg-5">
									<input class="form-control" type="search" placeholder="Rechercher"
										aria-label="Search" />
								</form>
								<div class="col-lg-2 ">
									<select class="form-control wide" name="id_type_abonnement" id="">
										<option value="aucun">Mois </option>
										<option value="aucun">Janvier </option>
										<option value="aucun">Février </option>
										<option value="aucun">Mars </option>
										<option value="aucun">Avril </option>
										<option value="aucun">Mai </option>
										<option value="aucun">Juin </option>
										<option value="aucun">Juillet </option>
										<option value="aucun">Août </option>
										<option value="aucun">Septembre </option>
										<option value="aucun">Octobre </option>
										<option value="aucun">Novembre </option>
										<option value="aucun">Décembre </option>
									</select>
								</div>
								<div class="col-lg-2 ">
									<select class="form-control wide" name="id_type_abonnement" id="">
										<option value="aucun">Année </option>
									</select>
								</div>
								<div class="col-lg-3 ">
									<button class="btn btn btn-primary w-100" data-bs-target="#caisse"
										data-bs-toggle="modal">Nouvelle Dépenses</button>
								</div>
							</div>
						</div>
					</div>
					<!-- row -->
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
							<div class="card h-100 card-lg mb-5">
								<div class="card-header d-block d-sm-flex border-0">
									<div class="col-lg-9 p-6">
										<h3 class="mb-0 fs-5">Gestion de la Caisse</h3>
									</div>
									<div class="col-g-3 text-end">
										<ul class="nav nav-tabs card-header-tabs text-end" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" href="#" aria-current="true" id="home-tab"
													data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button"
													role="tab"><strong>Entrées</strong></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#" id="profile-tab" data-bs-toggle="tab"
													data-bs-target="#profile-tab-pane" type="button"
													role="tab"><strong>Sorties</strong></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="lam-tab" data-bs-toggle="tab"
													data-bs-target="#lam-tab-pane" type="button"
													role="tab"><strong>Bilan</strong></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body p-0">
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
											aria-labelledby="home-tab" tabindex="0">
											<div class="table-responsive">
												<table
													class="table table-bordered table-responsive-md table-centered table-borderless text-nowrap table-hover">
													<thead class="bg-light">
														<tr>
															<th>N°</th>
															<th>Designation</th>
															<th>Quantité</th>
															<th>Prix Unitaire</th>
															<th>Prix Total</th>
														</tr>
													</thead>
													<tbody>

														<tr>
															<th scope="row"></th>
															<td class="bg-white"></td>
															<td></td>
															<td>XOF</td>
															<td> XOF</td>
														</tr>

													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
											aria-labelledby="profile-tab" tabindex="0">
											<div class="table-responsive">
												<table
													class="table table-bordered table-responsive-md table-centered table-borderless text-nowrap table-hover">
													<thead class="bg-light">
														<tr>
															<th>N°</th>
															<th>Designation</th>
															<th>Dépense Type</th>
															<th>Quantité</th>
															<th>Prix Unitaire</th>
															<th>Prix Total</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>

														<tr>
															<th scope="row">1</th>
															<td class="bg-white">Product Names</td>
															<td>
																<span class="badge badge-primary">Produis</span>
																<span class="badge badge-danger">Divers</span>
															</td>
															<td>NanNan</td>
															<td>NanNan XOF</td>
															<td>NanNan XOF</td>
															<td>
																<div class="d-flex">
																	<a href="#" data-bs-toggle="modal"
																		data-bs-target="#caisse"
																		class="btn btn-primary shadow btn-xs sharp me-1"><i
																			class="fas fa-pencil-alt"></i></a>
																	<a href="#"
																		class="btn btn-danger shadow btn-xs sharp"><i
																			class="fa fa-trash"></i></a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="lam-tab-pane" role="tabpanel"
											aria-labelledby="contact-tab" tabindex="0">
											<div class="table-responsive">
												<table
													class="table table-bordered table-responsive-sm table-responsive-md table-centered table-borderless text-nowrap table-hover">
													<thead class="bg-light">
														<tr>
															<th>#</th>
															<th>Chiffre d'Affaire</th>
															<th>Entrées</th>
															<th>Sorties</th>
															<th>Bénéfices</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th>1</th>
															<td>NanNan XOF</td>
															<td>NanNan XOF</td>
															<td>NanNan XOF</td>
															<td>NanNan XOF</td>
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
		</div>
		</section>
		</main>
	</div>
	<?php include('modal.php'); ?>
	<?php include('renouveller.php');?>
	</div>
	<div class="modal fade" id="caisse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Dépenses Diverses</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="row mb-2">
								<div class="col-sm-12">
									<label for="recipient-name" class="col-form-label">Désignation</label>
									<input type="text" placeholder="" name="designation" class="form-control pop">
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-sm-8">
									<label for="recipient-name" class="col-form-label">Prix Unitaire</label>
									<input type="number" placeholder="" name="coût" class="form-control pop">
								</div>
								<div class="col-sm-4">
									<label for="recipient-name" class="col-form-label">Quantités</label>
									<input type="number" placeholder="" name=" nombre" class="form-control pop">
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
						<button type="button" name="enregistrer" class="btn btn-primary">Enregistrer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include('menu.php');?>
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