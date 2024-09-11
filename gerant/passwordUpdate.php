<?php
  include("connexion.php");
  if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST['modifier']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['identifiant'])){
      if(!empty($_POST["email"])&&
      !empty($_POST["password"])&&
      !empty($_POST["identifiant"])){
         $identifiant = filter_var(trim($_POST["identifiant"]));
         $password = filter_var(trim($_POST["password"]));
         $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);

                if (!$email) {
                    $error = "EMAIL INVALIDE ! VEUILLEZ SAISIR UN EMAIL VALIDE";
                    //header("Location: index.php");
                    exit();
                }
    
                // Préparation et exécution de la requête de vérification 
                $requette = $connexion->prepare("SELECT COUNT(*) AS count FROM informationsm WHERE email = :email AND identifiant = :identifiant");
                $requette->bindParam(':email', $email, PDO::PARAM_STR);
                $requette->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
                $requette->execute();
                $result = $requette->fetch(PDO::FETCH_ASSOC);

                if ( $result['count'] >0) {
                  $req = $connexion->prepare("UPDATE `informationsm` SET `identifiant`='$password' WHERE email = '$email' ");
                  $req->execute();
                  $success = "MOT DE PASSE CHANGÉ AVEC SUCCES ! CLIQUER SUR RETOUR";
                  //header("Location: index.php");
                }else{
                  $error ="ENTRER DES IDENTIFIANTS VALIDES PUIS REESSAYER";
                  //header("Location: index.php");
                  exit();
                }
      }else{
         $error = "REMPLISSER TOUS LES CHAMPS";
        // header("Location: index.php");
      }
   }
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
      <a class="navbar-brand" href="../index.html">
        <img src="./assets/images/logo/freshcart-logo.svg" alt="" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav>
</div>

 
      <main>
         <!-- section -->
         <section class="my-lg-14 my-8">
            <div class="container">
               <!-- row -->
               <div class="row justify-content-center align-items-center">
                  <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                     <!-- img -->
                     <img src="./assets/images/svg-graphics/signin-g.svg" alt="" class="img-fluid" />
                  </div>
                  <!-- col -->
                  <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                     <div class="mb-lg-9 mb-5">
                        <h1 class="mb-1 h2 fw-bold">Modifier votre mot de passe !</h1>
                     </div>

                     <form method="POST" class="needs-validation" novalidate>
                        <div class="row g-3">
                           <!-- row -->
                           <div class="col-12">
                              <!-- input -->
                              <label for="formSigninEmail" class="form-label ">Adresse email</label>
                              <input type="email" class="form-control" id="formSigninEmail" name="email"  placeholder="market@gmail.com" required />
                              <div class="invalid-feedback">Entrez votre email.</div>
                           </div>
                           <div class="col-12">
                              <!-- input -->
                              <div class="password-field position-relative">
                                 <label for="formSigninPassword" class="form-label ">Ancien mot de passe</label>
                                 <div class="password-field position-relative">
                                    <input type="password" class="form-control fakePassword" name="identifiant" id="formSigninPassword" placeholder="*****" required />
                                    <div class="invalid-feedback">Entrer votre mot de passe.</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12">
                              <!-- input -->
                              <div class="password-field position-relative">
                                 <label for="formSigninPassword" class="form-label ">Nouveau mot de passe</label>
                                 <div class="password-field position-relative">
                                    <input type="password" class="form-control fakePassword" name="password" id="formSigninPassword" placeholder="*****" required />
                                    <div class="invalid-feedback">Entrer votre mot de passe.</div>
                                 </div>
                              </div>
                           </div>
                           <div class="d-flex justify-content-between">
                              <!-- form check -->
                           </div>
                           <!-- btn -->
                           <div class="col-12 d-grid"><button type="submit" name="modifier" class="btn btn-primary">Modifier</button></div>
                           <!-- link -->
                           <div class="col-12 d-grid gap-2">
                           <a href="index.php" class="btn btn-light">Retour</a>
                           </div>
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
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>

      <script src="../assets/js/vendors/password.js"></script>
      <script src="../assets/js/vendors/validation.js"></script>
   </body>

</html>
