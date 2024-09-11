<?php
    session_start();
    include("connexion.php");

    $alertMessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{!empty($_POST["nom"])&&
            !empty($_POST["ifu"])&&
            !empty($_POST["rccm"])&&
            !empty($_POST["email"])&&
            !empty($_POST["contact"])&&
            !empty($_POST["longitude"])&&
            !empty($_POST["lagitude"])&&
            !empty($_POST["ouverture"])&&
            !empty($_POST["fermeture"])&&
            !empty($_POST["siteweb"])&&
            !empty($_POST["localisation"])&&
            !empty($_FILES["logo"]['name']);
    
    
                $nom=htmlspecialchars(trim($_POST["nom"]));
                $ifu=htmlspecialchars(trim($_POST["ifu"]));
                $rccm=htmlspecialchars(trim($_POST["rccm"]));
                $longitude=htmlspecialchars(trim($_POST["longitude"]));
                $latitude=htmlspecialchars(trim($_POST["latitude"]));
                $ouverture=htmlspecialchars(trim($_POST["ouverture"]));
                $fermeture=htmlspecialchars(trim($_POST["fermeture"]));


                $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);

                if (!$email) {
                    $_SESSION['alertMessage'] = "EMAIL INVALIDE ! VEUILLEZ SAISIR UN EMAIL VALIDE";
                    if(isset($_POST['enregistrer'])){
                        header("Location:../adminplateforme/listesm.php");
                    }else{
                        header("Location:../index.php");
                    }
                    exit();
                }
    
                // Préparation et exécution de la requête de vérification 
                $requette = $conn->prepare("SELECT COUNT(*) AS count FROM informationsm WHERE email = :email OR rccm = :rccm OR ifu = :ifu");
                $requette->bindParam(':email', $email, PDO::PARAM_STR);
                $requette->bindParam(':rccm', $rccm, PDO::PARAM_STR);
                $requette->bindParam(':ifu', $ifu, PDO::PARAM_STR);
                $requette->execute();
                $result = $requette->fetch(PDO::FETCH_ASSOC);
    
                if ($result['count'] > 0) {
                    $_SESSION['alertMessage'] = "CES INFORMATIONS EXISTENT DEJA ! REESSAYEZ";
                    if(isset($_POST['enregistrer'])){
                        header("Location:../adminplateforme/listesm.php");
                    }else{
                        header("Location:../index.php");
                    }
                    exit();
                }

                $contact=htmlspecialchars(trim($_POST["contact"]));
                $siteweb=htmlspecialchars(trim($_POST["siteweb"]));
                $localisation=htmlspecialchars(trim($_POST["localisation"]));
                
                
                $logo=$_FILES['logo']['name'];
                $file_type=pathinfo($logo,PATHINFO_EXTENSION);
                $files_extension = strtolower($file_type);
                $file_size=$_FILES['logo']['size'];
                $file_tmp=$_FILES['logo']['tmp_name'];
                $file_error=$_FILES['logo']['error']; 
                $file_dest="img/".$logo; 
                $extension_auth = array("jpg","jpeg","png");
    
                if(in_array($files_extension,$extension_auth)){
                if(move_uploaded_file($file_tmp, $file_dest)){

                //GENERATION MATRICULE
                function genererIdentifiant($conn){
                    $lettres = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4);
                    $chiffres = substr(str_shuffle("0123456789"), 0, 6);
                    $identifiant = $lettres.$chiffres;
        
                    //VERIFICATION DE L'UNICITE DU MATRICULE
                    $sql = $conn->prepare("SELECT id FROM informationsm WHERE identifiant = '$identifiant'");
                    $sql->execute();
        
                    if($sql->num_rows > 0){
                        return genererIdentifiant($conn);
                    }else{
                        return $identifiant;
                    }
                }
                $identifiant = genererIdentifiant($conn);
                $id=uniqid();
        
                        //REQUETTE PREPARE D'INSERTION
                        $req = $conn->prepare("INSERT INTO `informationsm` (`id`,`nom`, `logo`, `ifu`, `rccm`, `email`,`identifiant`, `contact`,`longitude`,`latitude`,`ouverture`,`fermeture`, `siteweb`, `localisation` ) VALUES(:id, :nom, :logo, :ifu,:rccm,:email,:identifiant,:contact,:longitude,:latitude,:ouverture,:fermeture,:siteweb,:localisation)");
                        $req ->bindParam(':id', $id);
                        $req ->bindParam(':nom', $nom);
                        $req ->bindParam(':logo', $file_dest);
                        $req ->bindParam(':ifu', $ifu);
                        $req ->bindParam(':rccm', $rccm);
                        $req ->bindParam(':email', $email);
                        $req ->bindParam(':identifiant', $identifiant);
                        $req ->bindParam(':contact', $contact);
                        $req ->bindParam(':longitude', $longitude);
                        $req ->bindParam(':latitude', $latitude);
                        $req ->bindParam(':ouverture', $ouverture);
                        $req ->bindParam(':fermeture', $fermeture);
                        $req ->bindParam(':siteweb', $siteweb);
                        $req ->bindParam(':localisation', $localisation);
                        if($req->execute()){
                            $_SESSION['success']="INSCRIPTION REEUSSIE! VOUS RECEVREZ UN MESSAGE AVEC VOS IDENTIFIANTS";
                            if(isset($_POST['enregistrer'])){
                                header("Location:../adminplateforme/listesm.php");
                            }else{
                                header("Location:../index.php");
                            }
                        }else{

                        }
                    }
                }else{
                    $_SESSION['alertMessage']= "EXTENSION DE L'IMAGE INVALIDE !REESSAYER";
                    if(isset($_POST['enregistrer'])){
                        header("Location:../adminplateforme/listesm.php");
                    }else{
                        header("Location:../index.php");
                    }
                    exit();
                }
            }catch(PDOException $e){
                print "Erreur !:". $e->getMessage().'<br>';
            }
        }else{
            //$_SESSION['alertMessage']="REMPLISSEZ TOUS LES CHAMPS";
            $_SESSION['alertMessage'] = "REMPLISSEZ TOUS LES CHAMPS";
            if(isset($_POST['enregistrer'])){
                header("Location:../adminplateforme/listesm.php");
            }else{
                header("Location:../index.php");
            }
                    exit();
        }
        
?>