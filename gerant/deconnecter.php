<?php
session_start();
include("connexion.php");
$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);
$now = $date_actuelle->format('Y-m-d H:i:s');
// Détruire toutes les variables de session
if($_SESSION['etat']==false){
    if($_SESSION['heure_fin']<=$now){
        $upd = $connexion->prepare("UPDATE heure_gratuite SET heure_restante=NULL ,statut_h=2 WHERE id_user='$_SESSION[id]' ");
        $upd->execute();
        // Calculer le temps restant
    }elseif($_SESSION['heure_fin']>$now){
       $h=$_SESSION['heure_fin'];
       $calcul = new DateTime($h,$fuseau_horaire);
       $_heure = $date_actuelle->diff($calcul);
        $heure= $_heure->h;
        $min = $_heure->i;
        $sec = $_heure->s;
        $_heure_restante =$heure.':'.$min.':'.$sec;
        $heure_restante = date('H:i:s',strtotime("$_heure_restante"));
        $upd = $connexion->prepare("UPDATE heure_gratuite SET heure_restante='$heure_restante' WHERE id_user='$_SESSION[id]' ");
        $upd->execute();
    }
}
//Si vous voulez détruire la session complètement, effacez également le cookie de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou la page d'accueil
header("Location: index.php");
exit();
?>
