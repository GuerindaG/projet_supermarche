<?php
	require_once("connexion.php");

    $id_type_abonnement = $_POST["id_type_abonnement"];
	$type_abonnement =htmlspecialchars(trim($_POST["type_abonnement"]));
    $nombre_jour = htmlspecialchars(trim($_POST["nombre_jour"]));
    $montant = htmlspecialchars(trim($_POST["montant"]));

    
    
	//Recuperer les anciennes données

    $sql = $conn->prepare("UPDATE type_abonnement SET type_abonnement ='$type_abonnement' , nombre_jour='$nombre_jour', montant='$montant' WHERE id_type_abonnement= '$id_type_abonnement' ");
    $sql->execute();

    header("location:typeAbonnement.php");
?>