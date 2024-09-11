<?php
    include("connexion.php");

    //RECCUPERATION DES DONNEES
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST["nom"])&&
            !empty($_POST["naissance"])&&
            !empty($_POST["contact"])){
    
            $nom = htmlspecialchars(trim($_POST["nom"]));
            $naissance = htmlspecialchars(trim($_POST["naissance"]));
            $contact = htmlspecialchars(trim($_POST["contact"]));
            $id_prod=$_POST['id_prod'];
            $id_rayon=$_POST['id_rayon'];
            $quantite = htmlspecialchars(trim($_POST["quantite"]));
            $reference=rand(11111111111,22222222222);
            
            //REQUETTE PREPARE D'INSERTION
            $requette = $connexion->prepare("INSERT INTO `vente` (`id_prod`, `id_rayon`, `quantite` , `reference` ) VALUES('$id_prod','$id_rayon','$quantite','$reference')");
            $requette->execute();

            $req = $connexion->prepare("INSERT INTO `client` (`nom`, `contact`, `naissance` ) VALUES(:nom,:contact,:naissance)");
            $req ->bindParam(':nom', $nom);
            $req ->bindParam(':contact', $contact);
            $req ->bindParam(':naissance', $naissance);
            $req->execute();
            $success = "Client enregistré avec succès !";
            header('Location:vente.php');
        }else{
           echo "dfghj";
        }
    }
?>