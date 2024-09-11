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
	<link rel="stylesheet" href="../asset/css/all.css">

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
	  <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag("js", new Date());
        gtag("config", "G-M8S4MT3EYG");
    </script>
	
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
							<a class="nav-link  active " href="dashbord.php">
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
				<div class="table-responsive-xl mb-6 mb-lg-0">
					<div class="row flex-nowrap pb-3 pb-lg-0">
						<div class="col-lg-3 col-12 mb-6">
							<!-- card -->
							<div class="card h-100 card-lg bg-light-success">
								<!-- card body -->
								<div class="card-body p-6">
									<!-- heading -->
									<div class="d-flex justify-content-between align-items-center mb-6">
										<div>
											<h4 class="mb-0 fs-5">Total en Caisse</h4>
										</div>
										<div class="icon-shape icon-md bg-dark-danger text-light-danger rounded-circle">
											<i class="bi bi-currency-dollar fs-5"></i>
										</div>
									</div>
									<!-- project number -->
									<div class="lh-1">
										<h1 class="mb-2 fw-bold fs-2">FCFA 90 000</h1>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-12 mb-6">
							<!-- card -->
							<div class="card h-100 card-lg bg-light-success">
								<!-- card body -->
								<div class="card-body p-6">
									<!-- heading -->
									<div class="d-flex justify-content-between align-items-center mb-6">
										<div>
											<h4 class="mb-0 fs-5">Chiffre d'affaire</h4>
										</div>
										<div class="icon-shape icon-md bg-primary text-light-info rounded-circle">
											<i class="bi bi-credit-card fs-5"></i>
										</div>
									</div>
									<!-- project number -->
									<div class="lh-1">
										<h1 class="mb-2 fw-bold fs-2">FCFA 250 000</h1>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-12 mb-6">
							<!-- card -->
							<div class="card h-100 card-lg bg-light-success">
								<!-- card body -->
								<div class="card-body p-6">
									<!-- heading -->
									<div class="d-flex justify-content-between align-items-center mb-6">
										<div>
											<h4 class="mb-0 fs-5">Bénéfices</h4>
										</div>
										<div class="icon-shape icon-md bg-dark-info text-light-info rounded-circle">
											<i class="bi bi-people  fs-5"></i>
										</div>
									</div>
									<!-- project number -->
									<div class="lh-1">
										<h1 class="mb-2 fw-bold fs-2">FCFA 70 000</h1>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-12 mb-6">
							<!-- card -->
							<div class="card h-100 card-lg bg-light-success">
								<!-- card body -->
								<div class="card-body p-6">
									<!-- heading -->
									<div class="d-flex justify-content-between align-items-center mb-6">
										<div>
											<h4 class="mb-0 fs-5">Produit en stock</h4>
										</div>
										<div
											class="icon-shape icon-md bg-dark-warning text-light-warning rounded-circle">
											<i class="bi bi-minecart-loaded  fs-5"></i>
										</div>
									</div>
									<!-- project number -->
									<div class="lh-1">
										<h1 class="mb-2 fw-bold fs-2">300</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card h-100 card-lg mb-5">
					<div class="card-body">
						<div class="row p-5">
							<form role="Rechercher" class="col-lg-9">
								<input class="form-control" type="search" placeholder="Rechercher"
									aria-label="Search" />
							</form>
							<div class="col-lg-3 ">
								<button class="btn btn btn-primary w-100" data-bs-target="#stock"
									data-bs-toggle="modal">Nouveau stock</button>
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
								<h3 class="mb-0 fs-5">Gestion Des Stocks</h3>
							</div>
							<div class="card-body p-0">
								<!-- table -->
								<div class="table-responsive">
									<table
										class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
										<thead class="bg-light">
											<tr class="text-center">
												<th>N°</th>
												<th>Catégories/Rayon</th>
												<th>Produits</th>
												<th>Informations</th>
												<th>Réf/Code Produit</th>
												<th>Stock Disponible</th>
												<th>Prix d'achat</th>
												<th>Prix de vente</th>
												<th>Promotions</th>
												<th>Prix Promotionnel</th>
												<th>Période de promo</th>
												<th></th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$selectionner = $connexion->prepare("
												SELECT r.*, p.*, i.*
												FROM produit AS p
												INNER JOIN rayon AS r ON r.id_rayon = p.id_rayon
												INNER JOIN informationsm AS i ON i.id = p.id
												WHERE p.id = ?
												ORDER BY p.date_ajout_produit DESC
											");
											$selectionner->execute([$_SESSION['id']]);
												$a=1;
												while($afficher = $selectionner->fetch()){
											?>
											<tr class="text-center">
												<td><strong><?php echo $a ?></strong></td>
												<td><?php echo $afficher['nomR'] ?></td>
												<td><a href="#" data-bs-target="#produit"
														data-bs-toggle="modal"><?php echo $afficher['designation'] ?></a> </td>
												<td><span
														class="badge bg-light-secondary text-dark-secondary text-center"
														data-bs-target="#info<?php echo $afficher['id_prod'] ?>" data-bs-toggle="modal">voir</span></td>
												<td><?php echo $afficher['code'] ?></td>
												<td>
												<?php 
													
												?>	
												<span class="badge bg-light-primary text-primary"
														data-bs-target="#date<?php $afficher['id_prod']?>"
														data-bs-toggle="modal"><strong>En stock</strong></span></td>
												<td><?php echo $afficher['prix_achat'] ?></td>
												<td><?php echo $afficher['prix_vente'] ?></td>
												<td>
													<span class="badge bg-light-warning text-dark-warning"data-bs-target="#promo<?php echo $afficher['id_prod']?>" data-bs-toggle="modal"><?php  echo $afficher['pourcentage']."%"?></span>
												</td>
												<td><?php 
												if($afficher['pourcentage'] !=0){
													$prix = $afficher['prix_vente']*(1+(($afficher['pourcentage'])/100)) ;
													echo $prix;
												}else{
													echo 'NULL';
												}
													?>
												</td>
												<td>
												<?php 
												if($afficher['pourcentage'] !=0){
													  echo 'Du'.$afficher['debut_promo'] .'<br>';
													 echo 'Au '.$afficher['fin_promo'] ;
												}else{
													echo 'NULL';
												}
													?>
													
												</td>
												<td></td>
												<td>
													<div class="d-flex text-end">
														<a href="#" data-bs-toggle="modal" data-bs-target="#stock"
															class="btn btn-primary shadow btn-xs sharp me-1"><i
																class="bi bi-pencil-square me-3"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i
																class="bi bi-trash me-3"></i></a>
													</div>
												</td>
											</tr>
											<?php
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
			<?php include('modal.php');?>
			<?php include('renouveller.php');?>
	
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

	<!--MODAL AJOUT DE STOCK-->
	<div class="modal fade" id="stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un Produit</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				
					<form method="POST" action="stock_traitement.php">
						<div class="modal-body">
							<div class="row mb-2">
							<input type="hidden" name='id' value="<?php echo $_SESSION['id']?>">
								<div class="col-lg-6">
									<label for="recipient-name" class="col-form-label">Nom du Rayon</label>
									<select class="form-control wide" name="id_rayon" >
										<?php
											$show = $connexion->prepare("SELECT rayon.*,informationsm.* FROM rayon INNER JOIN informationsm ON rayon.id=informationsm.id WHERE rayon.id=? ORDER BY rayon.date_heure DESC ");
											$show->execute([$_SESSION['id']]);
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
									<input type="name" placeholder="" name="designation" class="form-control pop">
								</div>
								<div class="col-lg-12">
									<label for="recipient-name" class="col-form-label">Quantité</label>
									<input type="number" placeholder="" name="qte_p" class="form-control pop">
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">Prix d'Achat</label>
									<input type="number" placeholder="" name="prix_achat" class="form-control pop">
								</div>
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">Prix de Vente</label>
									<input type="number" placeholder="" name="prix_vente" class="form-control pop">
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-sm-12">
									<label for="recipient-name" class="col-form-label">Informations du Produits</label>
									<div class="col-lg-12 text-center">
										<textarea name="" id="" cols="90" name="info" rows="5"></textarea>
									</div>
								</div>
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
	
	<!--MODAL DATE-->
	<?php
		$historique = $connexion->prepare("SELECT * FROM produit ");
		$historique->execute();
		while($voir_hist = $historique->fetch()){
	?>
	<div class="modal fade" id="date<?php $voir_hist['id_prod']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-3" id="exampleModalLabel">Historique de stockage du produit <?php echo $voir_hist['code']?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table
							class="table table-responsive-md table-centered table-borderless text-nowrap table-hover">
							<thead class="bg-light">
								<tr>
									<th scope="col">N°</th>

									<th scope="col">Produits</th>
									<th scope="col">Quantités</th>
									<th scope="col">Fournisseurs</th>
									<th scope="col">Date de Commande</th>
									<th scope="col">Date de Livraison</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										1
									</td>

									<td>
										Mangue
									</td>
									<td>
										158
									</td>
									<td>
										<a href="profil.html">sarl</a>
									</td>
									<td>
										11/11/11##
									</td>
									<td>
										00/00/00#
									</td>
								</tr>
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
	<!--MODAL INFORMATION-->
	<?php
		$information = $connexion->prepare("SELECT * FROM produit ");
		$information->execute();
		while($montre_info = $information->fetch()){
	?>
	<div class="modal fade" id="info<?php echo $montre_info['id_prod'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title fs-3" id="exampleModalLabel">Informations du produit <?php echo $montre_info['code'] ?> </h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					<div class="card-body p-6">
						
							<?php
							 echo $montre_info['info'];
							?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>
	<!--MODAL PRODUIT-->
	<div class="modal fade" id="produit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-3" id="exampleModalLabel">Renouveller</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row mb-2">
							<div class="col-sm-6">
								<label for="recipient-name" class="col-form-label">Nouvelle Quantité</label>
								<input type="number" placeholder="Renouveller la quantité" class="form-control pop">
							</div>
							<div class="col-sm-6">
								<label for="recipient-name" class="col-form-label">Prix d'achat</label>
								<input type="number" placeholder="Mettre à jour le prix" class="form-control pop">
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-sm-12">
								<label for="recipient-name" class="col-form-label">Fournisseur</label>
								<select class="default-select form-control wide">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
					<button type="button" class="btn btn-primary">Enregistrer</button>
				</div>
			</div>
		</div>
	</div>
	<!--MODAL PROMOTION-->
	<?php
		$promo = $connexion->prepare("SELECT * FROM produit ");
		$promo->execute();
		while($promo_aff = $promo->fetch()){
	?>
	<div class="modal fade" id="promo<?php echo $promo_aff['id_prod']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<form method="POST" action="stock_traitement.php">
					<div class="modal-header">

						<h1 class="modal-title fs-5" id="exampleModalLabel">Informations sur la promotion <?php echo $promo_aff['code']?></h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
							<div class="row mb-2">
								<input type="hidden" value="<?php echo $_SESSION['id']?>">
								<div class="col-sm-12">
									<label for="recipient-name" class="col-form-label">Pourçcentage</label>
									<input type="number" placeholder="" name="pourcentage" class="form-control pop">
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">Date début promo</label>
									<input type="date" placeholder="" name="debut" class="form-control pop">
								</div>
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">Date fin promo</label>
									<input type="date" placeholder="" name="fin" class="form-control pop">
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">Heure début promo</label>
									<input type="time" placeholder="" name="h_debut" class="form-control pop">
								</div>
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">Heure fin promo</label>
									<input type="time" placeholder="" name="h_fin" class="form-control pop">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
								<button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
							</div>
						
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		}
	?>
	<!-- Libs JS -->
	<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script>  -->
	<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>

	<!-- Theme JS -->
	<script src="./assets/js/theme.min.js"></script>

	<script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="./assets/js/vendors/chart.js"></script>

	
	<script>
        	document.addEventListener('DOMContentLoaded', function () {
            const endTime = new Date('<?php echo $_SESSION['heure_fin']; ?>').getTime();
            const timerElement = document.getElementById('heure');
			const timer_Element = document.getElementById('timer');

            function updateTimer() {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance < 0 ) {
                    clearInterval(timerInterval);
                    timerElement.innerHTML = "Temps écoulé";
					timer_Element.innerHTML = "épuisé";
						modale = document.getElementById('message');
						if(modale){
							affModal = new bootstrap.Modal(modale);
							affModal.show();
						}
                    return;
                }

                //const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                timerElement.innerHTML = "Abonnement gratuit: "+ minutes + "min" + seconds + "s";
				timer_Element.innerHTML =  minutes + "min" + seconds + "s";

            }
            const timerInterval = setInterval(updateTimer, 1000);
            updateTimer();
       		});
    </script>

	<script>
        // Étape 2 : Passer la variable de session PHP à JavaScript
        var dateFin = '<?php echo $jour; ?>';

        // Étape 3 : Initialiser le minuteur de compte à rebours
        function initialiserCompteRebours(dateFin) {
            var dateFin = new Date(dateFin).getTime();

            // Mettre à jour le compte à rebours toutes les 1 seconde
            var compteRebours = setInterval(function() {
                var maintenant = new Date().getTime();
                var distance = dateFin - maintenant;

                // Calculer le temps restant en mois, jours, heures, minutes et secondes
                var totalSeconds = Math.floor(distance / 1000);
                var mois = Math.floor(totalSeconds / (30 * 24 * 60 * 60)); // Approximation des mois
                totalSeconds %= (30 * 24 * 60 * 60);
                var jours = Math.floor(totalSeconds / (24 * 60 * 60));
                totalSeconds %= (24 * 60 * 60);
                var heures = Math.floor(totalSeconds / (60 * 60));
                totalSeconds %= (60 * 60);
                var minutes = Math.floor(totalSeconds / 60);
                var secondes = totalSeconds % 60;

                // Afficher le résultat dans l'élément avec id="countdown"
                document.getElementById("countdown").innerHTML = mois + "mois " + jours + "j " + heures + ":"
                + minutes + ":" + secondes;

                // Si le compte à rebours est terminé, afficher un message
                if (distance < 0) {
                    clearInterval(compteRebours);
                    document.getElementById("countdown").innerHTML = "EXPIRÉ";
						mod = document.getElementById('renouveler');
						if(mod){
							afficherMod = new bootstrap.Modal(mod);
							afficherMod.show();
						}
                }
            }, 1000);
        }

        // Initialiser le compte à rebours avec l'heure de fin
        initialiserCompteRebours(dateFin);
    </script>

</body>

</html>