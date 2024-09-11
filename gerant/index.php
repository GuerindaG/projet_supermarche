<?php
session_start();
include('connexion.php');

$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);
if (isset($_POST['connexion']) && isset($_POST['email']) && isset($_POST['identifiant'])) {
    try {
        // Préparation de la requête SQL
        $req = $connexion->prepare("SELECT * FROM informationsm WHERE email = :email");
        $req->bindParam(':email', $_POST['email']);
        $req->execute();

        // Récupération des données de l'utilisateur
        $row = $req->fetch(PDO::FETCH_ASSOC);
		
        if ($row !== false) {
            $storedPassword = $row['identifiant'];

            // Vérification du mot de passe (texte clair pour l'instant)
            if ($_POST['identifiant'] === $storedPassword) {
                // Définition des variables de session
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
				$_SESSION['nom'] = $row['nom'];
                $_SESSION['login'] = true;
		
				//Selection pour voir si la personne s'est deja connecte a sa session une fois
				$select1 = $connexion->prepare("SELECT*FROM heure_gratuite WHERE id_user='$row[id]'");
				$select1->execute();
				if($select1->rowCount()>0){
					//Si la personne ne s'est  connectée on verifie si elle s'est abonnée une fois ou pas
					$select = $connexion->prepare("SELECT a.*,t.*,i.* FROM abonnement AS a JOIN type_abonnement AS t ON a.id_type_abonnement = t.id_type_abonnement JOIN informationsm AS i ON a.id=i.id WHERE a.id='$row[id]'");
					$select->execute();
					$recup = $select->fetch();
					$_SESSION['abonnement']=$recup['statut'];
					
					//Requette de verification si l'utilisateur est déjà abonné et l'etat est true
					if($_SESSION['abonnement']==0 AND $_SESSION['abonnement']!==NULL){
						$_SESSION['etat']=true;
					}else{
						$story = $select1->fetch();
						//verifier s'il a  ecoulé ses heures ou non
						if($story['statut_h']==0){
							//si ses heures restent alors l'etat est à false et on recupere heure restante
							$heure_restante = $story['heure_restante'];
							$heure_rest = DateTime::createFromFormat('H:i:s', $heure_restante, $fuseau_horaire);

							// Extraire les heures, minutes et secondes du temps restant
							$heures = $heure_rest->format('H');
							$minutes = $heure_rest->format('i');
							$secondes = $heure_rest->format('s');

							// Créer un objet DateInterval avec le temps restant
							$interval = new DateInterval("PT{$heures}H{$minutes}M{$secondes}S");
							

							$date_actuelle->add($interval);
							$_SESSION['heure_fin']=$date_actuelle->format('Y-m-d H:i:s') ;
						}else{
							//si ses heures restent pas alors l'etat est à false et on recupere heure restante sur NULL
							$_SESSION['heure_fin']=NULL;
						}
						$_SESSION['etat']=false;
						}
				}else{
					//echo"j'ai faim";
					//Si non on doit enregistrer ses infos
					//INSERTION DANS UNE TABLE
					$now = $date_actuelle->format('Y-m-d H:i:s');
					$insert = $connexion->prepare("INSERT INTO heure_gratuite (id_user,date_clic) VALUES (:id,:now)");
					$insert->execute(['id'=>$row['id'],'now'=>$now]);
					//Actualisation des données de session
					$date_actuelle->add(new DateInterval("PT1H"));
					$_SESSION['heure_fin'] = $date_actuelle->format('Y-m-d H:i:s');
					//Si la personne n'est pas abonné
					$_SESSION['etat']=false;
				}
                //Redirection vers le tableau de bord
				header("Location: dashbord.php");
            } else {
				$error = "Identifiants incorrects. Veuillez réessayer.";
            }
        } else {
			$error = "Identifiants incorrects. Veuillez réessayer.";
        }
    } catch (PDOException $e) {
        // Affichage du message d'erreur
        echo "Erreur ! : " . $e->getMessage() . "<br>";
    }
} else {
	echo"";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta content="Codescandy" name="author" />
	<title>Gestion de supermarchés</title>
	<!-- Favicon icon-->
	<link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico" />

	<!-- Libs CSS -->
	<link href="./assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
	<link href="./assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet" />
	<link href="./assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="./assets/css/theme.min.css" />
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





	<!-- navigation -->
	<div class="border-bottom shadow-sm">
		<nav class="navbar navbar-light py-2">
			<div class="container justify-content-center justify-content-lg-between">
				<a class="navbar-brand" href="index.php">
					<img src="./assets/images/logo/freshcart-logo.svg" alt="" class="d-inline-block align-text-top" />
				</a>
			</div>
		</nav>
	</div>

	<main>
		<!-- section -->

		<section class="my-lg-14 my-8">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row justify-content-center align-items-center">
					<div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
						<!-- img -->
						<img src="./assets/images/svg-graphics/signup-g.svg" alt="" class="img-fluid" />
					</div>
					<!-- col -->
					<div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
						<div class="mb-lg-9 mb-5">
							<h1 class="mb-1 h2 fw-bold">Connectez-vous</h1>
							<p>Bienvenue</p>
						</div>
						<!-- form -->
						<form  method="POST" class="needs-validation" novalidate>
							<div class="row g-3">
								<div class="col-12">
									<!-- input -->
									<label for="formSignupEmail" class="form-label ">Identifiant</label>
									<input type="email" class="form-control" name="email" id="" placeholder="identifiant@gmail.com"
										required />
									<div class="invalid-feedback">Votre Identifiant.</div>
								</div>
								<div class="col-12">
									<div class="password-field position-relative">
										<label for="formSignupPassword" class="form-label ">Mot de passe</label>
										<div class="password-field position-relative">
											<input type="password" class="form-control " name="identifiant"
												id="" placeholder="*****" required />
											<div class="invalid-feedback">Votre mot de passe.</div>
										</div>
									</div>
								</div>
								<!-- btn -->
								<div class="col-12 d-grid"><button type="submit" name="connexion" class="btn btn-primary">Soumettre</button></div>
								<div class="text-center"><a href="passwordOublie.php">Mot de passe oublié ?</a><a href="passwordUpdate.php">Modifier le mot de passe?</a></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>


	<!-- Javascript-->
	<!-- Libs JS -->
	<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
	<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>

	<!-- Theme JS -->
	<script src="./assets/js/theme.min.js"></script>

	<script src="./assets/js/vendors/password.js"></script>

	<script src="./assets/js/vendors/validation.js"></script>
</body>

<!-- Mirrored from freshcart.codescandy.com/pages/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 14:40:32 GMT -->

</html>