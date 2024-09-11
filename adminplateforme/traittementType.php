<?php
//CONNEXION
    session_start();
    include("connexion.php");

//RECCUPERATION DES DONNEES
    if(isset($_POST['type_abonnement']) && isset($_POST['nombre_jour']) && isset($_POST['montant'])){
        if(!empty($_POST['type_abonnement']) && !empty($_POST['nombre_jour']) && !empty($_POST['montant'])){
    $type_abonnement = htmlspecialchars(trim($_POST["type_abonnement"]));
    $nombre_jour = htmlspecialchars(trim($_POST["nombre_jour"]));
    $montant = htmlspecialchars(trim($_POST["montant"]));

//INSERTION DANS LA BASE DE DONNEES
    $sql = $conn->prepare("INSERT INTO type_abonnement (type_abonnement,nombre_jour,montant) VALUES('$type_abonnement','$nombre_jour','$montant')");
    $sql->execute();
    //$_SESSION['message'] = "Type d'abonnement ajouté avec succès !";
    header("Location:typeAbonnement.php");
    }else{
       // $_SESSION['error'] = "Veuillez remplir tous les champs.";
        header("Location:typeAbonnement.php");
        exit();
    }
}
?>