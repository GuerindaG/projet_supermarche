<?php
    include("connexion.php");

    //RECCUPERATION DES DONNEES
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id=$_POST['id'];
            $id_rayon=$_POST['id_rayon'];
            $designation = htmlspecialchars(trim($_POST["designation"]));
            $qte_p = htmlspecialchars(trim($_POST["qte_p"]));
            $prix_achat = htmlspecialchars(trim($_POST["prix_achat"]));
            $prix_vente = htmlspecialchars(trim($_POST["prix_vente"]));
            $info = htmlspecialchars(trim($_POST["info"]));
            $code = rand(111,999);

        

           
                $pourcentage = htmlspecialchars(trim($_POST["pourcentage"]));
                $debut = htmlspecialchars(trim($_POST["debut"]));
                $fin = htmlspecialchars(trim($_POST["fin"]));
                $h_debut = htmlspecialchars(trim($_POST["h_debut"]));
                $h_fin = htmlspecialchars(trim($_POST["h_fin"]));
                
                
     
            //REQUETTE PREPARE D'INSERTION
            $req = $connexion->prepare("INSERT INTO `produit`(`designation`, `qte_p`, `prix_vente`, `prix_achat`, `id_rayon`,`code`, `info`,`id`) VALUES ('$designation','$qte_p','$prix_vente','$prix_achat','$id_rayon','$code','$info','$id')");
            $req->execute();
            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location:dashbord.php');

            //REQUETTE PREPARE D'INSERTION
            $req = $connexion->prepare("INSERT INTO `produit`(`pourcentage`, `debut_promo`, `fin_promo`, `heure_debut`, `heure_fin`) VALUES ('$pourcentage','$debut','$fin','$h_debut','$h_fin')");
            $req->execute();
            header('Location:dashbord.php');
       
    }
?>