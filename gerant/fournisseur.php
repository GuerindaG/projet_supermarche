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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
<?php
        if (isset($erreur)) {
    ?>
        <script type='text/javascript'>
            Swal.fire({
            icon: "error",
            text: "<?php echo addslashes($erreur);?>",
            });
        </script>
    <?php
        unset($erreur);
    }
    if(isset($succes)){
    ?>
    <script type='text/javascript'>
        Swal.fire({
        text: "<?php echo addslashes($succes); ?>",
        icon: 'success'
        });
    </script>

    <?php 
        unset($succes);
    }
    
    ?>
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
							<a class="nav-link" href="dashbord.php">
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
							<a class="nav-link " href="caisse.php">
								<div class="d-flex align-items-center">
									<span class="nav-link-icon"><i class="bi bi-newspaper"></i></span>
									<span class="nav-link-text">Caisse</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="fournisseur.php">
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
								<button class="btn btn btn-primary w-100" data-bs-target="#fournisseur"
									data-bs-toggle="modal">Ajouter fournisseur</button>
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
								<h3 class="mb-0 fs-5">Régistre des Fournisseurs</h3>
							</div>
							<div class="card-body p-0">
								<!-- table -->
								<div class="table-responsive">
									<table
										class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
										<thead class="bg-light">
											<tr class="text-center">
												<th>N°</th>
												<th>Nom du fournisseur</th>
												<th>Email/Contact</th>
												<th>Adresse</th>
												<th>Date d'inscription</th>

												<th colspan="2" class="">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i=1;
												$requette=$connexion->prepare("SELECT*FROM fournisseur ORDER BY date_inscription DESC");
												$requette->execute();
												while($affichage = $requette->fetch()){
													
											?>
											<tr class="text-center">
												<td><?php echo $i ?></td>
												<td><?php echo $affichage['nom'] ?> <br>
												IFU: <?php echo $affichage['ifu'] ?>  
												<?php if(!empty($affichage['rccm']) || ($affichage['rccm'])!== NULL ){
													echo "|| RCCM:" . $affichage['rccm']; 
													}else{ 
														echo "";
													} ?>
												</td>
												<td><?php echo $affichage['email'] ?><br>
												<?php echo $affichage['contact'] ?>
												</td>
												<td><?php echo $affichage['adresse'] ?></td>
												<td><?php
													$date = new DateTime($affichage['date_inscription'],$fuseau_horaire);
													echo $date-> format('d/m/Y H:i:s');
												?> </td>

												<td>
													<div class="d-flex text-center">
														<a href="#" data-bs-toggle="modal" data-bs-target="#fournisseur<?php echo $affichage['id_fournisseur'] ?>"
															class="btn btn-primary shadow btn-xs sharp me-1"><i
																class="bi bi-pencil-square "></i></a>
														<a href="supF.php?id_fournisseur=<?php echo $affichage['id_fournisseur'] ?> " class="btn btn-danger shadow btn-xs sharp"><i
																class="bi bi-trash "></i></a>
													</div>
												</td>
											</tr>
											<?php
											include("modF.php");
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
			</section>
		</main>
	</div>
	</div>
	<!--MODAL AJOUT FOURNISSEURS-->
	<div class="modal fade" id="fournisseur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau fournisseur</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-bs-toggle="tab" href="#home"><i
											class="fas fa-home me-2"></i> Entreprise</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#profile"><i
											class="fas fa-user me-2"></i>Particulier</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="home" role="tabpanel">
								<form action="traittementF.php" method="POST">
									<div class="col-sm-12">
							<input type="hidden" name='id' value="<?php echo $_SESSION['id']?>">

										<label for="recipient-name" class="col-form-label">Nom de l'entreprise</label>
										<input type="text" placeholder="Entrez votre nom" name="nom"
											class="form-control pop">
									</div>
									<div class="row mb-2">
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">IFU</label>
											<input type="number" placeholder="Entrez votre IFU" name="ifu"
												class="form-control pop">
										</div>
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">RCCM</label>
											<input type="number" placeholder="Entrez votre RCCM" name="rccm"
												class="form-control pop">
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-sm-12">
											<label for="recipient-name" class="col-form-label">Adresse Email</label>
											<input type="email" placeholder="Entrez votre adresse email" name="email"
												class="form-control pop">
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">Contact</label>
											<input type="tel" placeholder="	Entrez votre contact" name="contact"
												class="form-control pop">
										</div>
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">Adresse</label>
											<input type="text" placeholder="Entrez votre adresse" name="adresse"
												class="form-control pop">
										</div>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
									<input type="submit"  name="enregistrer" class="btn btn-primary"></div>
								</form>
								</div>
								<div class="tab-pane fade" id="profile">
									<form action="traittementF.php" method="POST">
							<input type="hidden" name='id' value="<?php echo $_SESSION['id']?>">

										<div class="col-sm-12">
											<label for="recipient-name" class="col-form-label">Nom </label>
											<input type="text" placeholder="Entrez votre nom" name="nom"
												class="form-control pop">
										</div>
										<div class="row mb-2">
											<div class="col-sm-6">
												<label for="recipient-name" class="col-form-label">IFU</label>
												<input type="number" placeholder="Entrez votre IFU" name="ifu"
													class="form-control pop">
											</div>
											<div class="col-sm-6">
												<label for="recipient-name" class="col-form-label">Contact</label>
												<input type="tel" placeholder="Entrez votre contact" name="contact"
													class="form-control pop">
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-sm-12">
												<label for="recipient-name" class="col-form-label">Adresse Email</label>
												<input type="email" placeholder="Entrez votre adresse email" name="email"
													class="form-control pop">
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-sm-12">
												<label for="recipient-name" class="col-form-label">Adresse</label>
												<input type="text" placeholder="Entrez votre adresse" name="adresse"
													class="form-control pop">
											</div>
										</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
									<input type="submit" name="valider" class="btn btn-primary"></div>
									</form>
								</div>
							</div>
						

					</div>
					
				
			</div>
		</div>
	</div>
	<?php include('modal.php'); ?>
	<?php include('renouveller.php');?>
	<?php include('menu.php');?>
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