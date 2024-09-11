<?php
   include("connexion.php");

    $id_rayon= $_GET['id_rayon'];
    //Suprimer
    $sql = $connexion->prepare("DELETE FROM rayon WHERE id_rayon='$id_rayon'");
    $sql->execute();

    header("location:categories.php");

?>