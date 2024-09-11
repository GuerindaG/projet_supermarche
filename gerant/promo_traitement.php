<?php
    include("connexion.php");

    //RECCUPERATION DES DONNEES
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
           
            $pourcentage = htmlspecialchars(trim($_POST["pourcentage"]));
            $debut = htmlspecialchars(trim($_POST["debut"]));
            $fin = htmlspecialchars(trim($_POST["fin"]));
            $h_debut = htmlspecialchars(trim($_POST["h_debut"]));
            $h_fin = htmlspecialchars(trim($_POST["h_fin"]));
            
            //REQUETTE PREPARE D'INSERTION
            $req = $connexion->prepare("INSERT INTO `promotion`(`pourcentage`, `debut_promo`, `fin_promo`, `heure_debut`, `heure_fin`) VALUES ('$pourcentage','$debut','$fin','$h_debut','$h_fin')");
            $req->execute();
            header('Location:dashbord.php');
       
    }
?>