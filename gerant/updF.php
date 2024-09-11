<?php
include("connexion.php");
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $id_fournisseur = $_POST['id_fournisseur'];
         if(!empty($_POST['rccm'])){ 
    
               
                $nom=htmlspecialchars(trim($_POST["nom"]));
                $ifu=htmlspecialchars(trim($_POST["ifu"]));
                $rccm=htmlspecialchars(trim($_POST["rccm"]));

                $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);

                if (!$email) {
                    echo "EMAIL INVALIDE ! VEUILLEZ SAISIR UN EMAIL VALIDE";
                   // header("Location: fournisseur.php");
                    exit();
                }
    
                // Préparation et exécution de la requête de vérification 
                $requette = $connexion->prepare("SELECT COUNT(id_fournisseur) AS count FROM fournisseur WHERE (email = :email OR rccm = :rccm OR ifu = :ifu) AND id_fournisseur != :id_fournisseur ");
                $requette->bindParam(':email', $email, PDO::PARAM_STR);
                $requette->bindParam(':rccm', $rccm, PDO::PARAM_STR);
                $requette->bindParam(':ifu', $ifu, PDO::PARAM_STR);
                $requette->bindParam(':id_fournisseur', $id_fournisseur, PDO::PARAM_STR);
                $requette->execute();
                $result = $requette->fetch(PDO::FETCH_ASSOC);

                if ($result['count'] > 0) {
                    echo "CES INFORMATIONS EXISTENT DEJA ! REESSAYEZ";
                    header("Location: fournisseur.php");
                    exit();
                }

                $contact=htmlspecialchars(trim($_POST["contact"]));
                $adresse=htmlspecialchars(trim($_POST["adresse"]));

                //REQUETTE PREPARE
              $req = $connexion->prepare("UPDATE `fournisseur` SET `nom`='$nom',`rccm`='$rccm',`ifu`='$ifu',`email`='$email',`contact`='$contact',`adresse`='$adresse' WHERE id_fournisseur = '$id_fournisseur' ");
              $req->execute();
              header('Location:fournisseur.php');
        }else{
            $nom=htmlspecialchars(trim($_POST["nom"]));
            $ifu=htmlspecialchars(trim($_POST["ifu"]));

            $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);

            if (!$email) {
                echo "EMAIL INVALIDE ! VEUILLEZ SAISIR UN EMAIL VALIDE";
                header("Location: fournisseur.php");
                exit();
            }

            // Préparation et exécution de la requête de vérification 
            $requette = $connexion->prepare("SELECT COUNT(id_fournisseur) AS count FROM fournisseur WHERE (email = :email OR ifu = :ifu) AND id_fournisseur != :id_fournisseur ");
            $requette->bindParam(':email', $email, PDO::PARAM_STR);
            $requette->bindParam(':ifu', $ifu, PDO::PARAM_STR);
            $requette->bindParam(':id_fournisseur', $id_fournisseur, PDO::PARAM_STR);
            $requette->execute();
            $result = $requette->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                echo "CES INFORMATIONS EXISTENT DEJA ! REESSAYEZ";
                header("Location: fournisseur.php");
                exit();
            }

            $contact=htmlspecialchars(trim($_POST["contact"]));
            $adresse=htmlspecialchars(trim($_POST["adresse"]));

            //REQUETTE PREPARE D'INSERTION
            $req = $connexion->prepare("UPDATE `fournisseur` SET `nom`=:nom,`ifu`=:ifu,`email`=:email,`contact`=:contact,`adresse`=:adresse WHERE id_fournisseur = '$id_fournisseur' ");
            $req ->bindParam(':nom', $nom);
            $req ->bindParam(':ifu', $ifu);
            $req ->bindParam(':email', $email);
            $req ->bindParam(':contact', $contact);
            $req ->bindParam(':adresse', $adresse);
            $req->execute();
            header('Location:fournisseur.php');
        }

}
        
?>