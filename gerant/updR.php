<?php
include("connexion.php");
    $id_rayon = $_POST['id_rayon'];
    $nomR =htmlspecialchars(trim($_POST['nomR']));

        $req = $connexion -> prepare("UPDATE rayon SET nomR='$nomR' WHERE id_rayon = '$id_rayon' ");
		$req->execute();
        $succes = "Rayon modifié avec succès !";
        header("Location:categories.php");
    ?>