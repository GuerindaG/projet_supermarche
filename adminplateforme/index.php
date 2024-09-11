<?php
include('connexion.php');
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    try {
        // Préparation de la requête SQL
        $req = $conn->prepare("SELECT * FROM super_admin WHERE email = :email");
        $req->bindParam(':email', $_POST['email']);
        $req->execute();

        // Récupération des données de l'utilisateur
        $row = $req->fetch(PDO::FETCH_ASSOC);

        if ($row !== false) {
            $storedPassword = $row['password'];

            // Vérification du mot de passe (texte clair pour l'instant)
            if ($_POST['password'] === $storedPassword) {
                // Définition des variables de session
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['login'] = true;
                // Redirection vers la page de vue de table
                header("Location: listesm.php");
                exit();
            } else {
                echo "<script type=\"text/javascript\">
                alert('Mot de passe INCORRECT')</script>";
            }
        } else {
            echo "<script type=\"text/javascript\">
            alert('Utilisateur Non Trouvé')</script>";
        }
    } catch (PDOException $e) {
        // Affichage du message d'erreur
        echo "Erreur ! : " . $e->getMessage() . "<br>";
    }
} else {
    echo "";
}
?>


<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>Clever Dashboard | Made by Webpixels</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/utilities.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css">
    <script defer="defer" data-domain="webpixels.works" src="../plausible.io/js/script.js"></script>
</head>

<body>
    <div>
        <div class="px-5 py-5 p-lg-0 h-screen bg-surface-secondary d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center">
                <div
                    class="col-12 col-md-9 col-lg-6 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                    <div class="row">
                        <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
                            <div class="text-center mb-12">
                                <h3 class="display-5">👋</h3>
                                <h1 class="ls-tight font-bolder mt-6">Bienvenue !</h1>
                            </div>
                            <form method="POST">
                                <div class="mb-5">
                                    <label class="form-label" for="email">Adresse email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre adresse email">
                                </div>
                                <div class="mb-5">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div><label class="form-label" for="password">Mot de passe</label></div>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez Votre mot de passe" autocomplete="current-password">
                                </div>
                                <div class="text-center"><input type="submit" class="btn btn btn-primary form-control" Value="Se connecter"></div>
                                <div class="text-center"><a href="basic-recover.html">Mot de passe oublié ?</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>