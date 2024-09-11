<?php
    require_once("connexion.php");

    $id = $_GET['id'];
    //Suprimer
    $sql = $conn->prepare("DELETE FROM informationsm WHERE id='$id'");
    $sql->execute();

    header("location:listesm.php");

?>