<?php
   include("connexion.php");

    $id_fournisseur= $_GET['id_fournisseur'];
    //Suprimer
    $sql = $connexion->prepare("DELETE FROM fournisseur WHERE id_fournisseur='$id_fournisseur'");
    $sql->execute();

    header("location:fournisseur.php");

?>