<?php
include("connexion.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["enregistrer"])){
        if(!empty($_POST["nom"])&&
            !empty($_POST["ifu"])&&
            !empty($_POST["rccm"])&&
            !empty($_POST["email"])&&
            !empty($_POST["contact"])){
    
    
                $nom=htmlspecialchars(trim($_POST["nom"]));
                $ifu=htmlspecialchars(trim($_POST["ifu"]));
                $rccm=htmlspecialchars(trim($_POST["rccm"]));

                $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);

                if (!$email) {
                    $erreur = "EMAIL INVALIDE ! VEUILLEZ SAISIR UN EMAIL VALIDE";
                    header("Location: fournisseur.php");
                    exit();
                }
    
                // Préparation et exécution de la requête de vérification 
                $requette = $connexion->prepare("SELECT COUNT(*) AS count FROM fournisseur WHERE email = :email OR rccm = :rccm OR ifu = :ifu");
                $requette->bindParam(':email', $email, PDO::PARAM_STR);
                $requette->bindParam(':rccm', $rccm, PDO::PARAM_STR);
                $requette->bindParam(':ifu', $ifu, PDO::PARAM_STR);
                $requette->execute();
                $result = $requette->fetch(PDO::FETCH_ASSOC);

                if ($result['count'] > 0) {
                    $erreur= "CES INFORMATIONS EXISTENT DEJA ! REESSAYEZ";
                    header("Location: fournisseur.php");
                    exit();
                }

                $contact=htmlspecialchars(trim($_POST["contact"]));
                $adresse=htmlspecialchars(trim($_POST["adresse"]));

                //REQUETTE PREPARE D'INSERTION
                $req = $connexion->prepare("INSERT INTO `fournisseur` (`nom`,`rccm`,`ifu`, `email`, `contact`, `adresse` ) VALUES(:nom,:rccm,:ifu,:email,:contact,:adresse)");
                $req ->bindParam(':nom', $nom);
                $req ->bindParam(':rccm', $rccm);
                $req ->bindParam(':ifu', $ifu);
                $req ->bindParam(':email', $email);
                $req ->bindParam(':contact', $contact);
                $req ->bindParam(':adresse', $adresse);
                $req->execute();
                $succes = "Fournisseur enregistré avec succès !";
                header('Location:fournisseur.php');
            }else{
                $erreur="Remplissez tous les champs !";
            }
            //SECOND TRAITTEMENT
        }else{
            
            if(!empty($_POST["nom"])&&
            !empty($_POST["ifu"])&&
            !empty($_POST["email"])&&
            !empty($_POST["contact"])){
    
    
                $nom=htmlspecialchars(trim($_POST["nom"]));
                $ifu=htmlspecialchars(trim($_POST["ifu"]));

                $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);

                if (!$email) {
                    $erreur= "EMAIL INVALIDE ! VEUILLEZ SAISIR UN EMAIL VALIDE";
                    header("Location: fournisseur.php");
                    exit();
                }
    
                // Préparation et exécution de la requête de vérification 
                $requette = $connexion->prepare("SELECT COUNT(*) AS count FROM fournisseur WHERE email = :email  OR ifu = :ifu");
                $requette->bindParam(':email', $email, PDO::PARAM_STR);
                $requette->bindParam(':ifu', $ifu, PDO::PARAM_STR);
                $requette->execute();
                $result = $requette->fetch(PDO::FETCH_ASSOC);

                if ($result['count'] > 0) {
                    $erreur= "CES INFORMATIONS EXISTENT DEJA ! REESSAYEZ";
                    header("Location: fournisseur.php");
                    exit();
                }

                $contact=htmlspecialchars(trim($_POST["contact"]));
                $adresse=htmlspecialchars(trim($_POST["adresse"]));

                //REQUETTE PREPARE D'INSERTION
                $req = $connexion->prepare("INSERT INTO `fournisseur` (`nom`,`ifu`, `email`, `contact`, `adresse` ) VALUES(:nom,:ifu,:email,:contact,:adresse)");
                $req ->bindParam(':nom', $nom);
                $req ->bindParam(':ifu', $ifu);
                $req ->bindParam(':email', $email);
                $req ->bindParam(':contact', $contact);
                $req ->bindParam(':adresse', $adresse);
                $req->execute();
                $succes = "Fournisseur enregistré avec succès !";
                header('Location:fournisseur.php');
            }else{
                $erreur="Remplissez tous les champs !";
            }
        }
    }
?>