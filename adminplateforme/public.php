<?php
include ("connexion.php");
if(isset($_GET["id"])){

    $id=htmlspecialchars(trim($_GET["id"]));
    
    $stock=$conn->prepare("UPDATE informationsm SET compte='1', date_heure = NOW() WHERE id='".$id."'");
    $stock->execute();
    header("location: listesm.php");
}
?>