<?php
	require_once("connexion.php");

    $id_abonnement  = $_POST["id_abonnement"];
    
    $id_type_abonnement  = $_POST["id_type_abonnement"];

    

    $sql =$conn->prepare( "UPDATE abonnement SET id_type_abonnement='$id_type_abonnement' WHERE id_abonnement = '$id_abonnement' ");
    $sql->execute();
    header("location:abonnement.php");
    ?>