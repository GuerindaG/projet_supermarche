<?php
    include("connexion.php");
    $id_abonnement  = $_GET['id_abonnement'];
    //Suprimer
    $sql = $conn->prepare("DELETE FROM abonnement WHERE id_abonnement='$id_abonnement'");
    $sql->execute();
    header("location:abonnement.php");
?>