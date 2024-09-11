<?php
    require_once("connexion.php");

    $id_type_abonnement = $_GET['id_type_abonnement'];
    //Suprimer
    $sql = $conn->prepare("DELETE FROM type_abonnement WHERE id_type_abonnement='$id_type_abonnement'");
    $sql->execute();

    header("location:typeAbonnement.php");

?>