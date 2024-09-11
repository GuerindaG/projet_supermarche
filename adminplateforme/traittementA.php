<?php
session_start();
include('connexion.php');
$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['id_type_abonnement'])) {
        $id = $_POST['id'];
        $id_type_abonnement = $_POST['id_type_abonnement'];

        if ($id != 'aucun' && $id_type_abonnement != 'aucun'){
            try {
                
                //INSERTION
                $insertion = $conn->prepare("INSERT INTO abonnement (id,id_type_abonnement) VALUES ('$id','$id_type_abonnement')");
                $insertion->execute();
                $_SESSION['message'] = "Abonnement réussi ! Votre statut a été mis à jour.";

                // Mettre à jour le statut 

                $req = $conn->prepare("UPDATE informationsm SET statut = 0 WHERE id = :id");
                $req->bindParam(':id', $id);
                $req->execute();

                $stock=$conn->prepare("UPDATE informationsm SET compte='1', date_heure = NOW() WHERE id='".$id."'");
                $stock->execute();
                
                  $_SESSION['etat']=true;
                  
               if(isset($_POST['valide'])){
                    header("Location:../gerant/dashbord.php");  
                }else{
                header("Location:abonnement.php");
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        } else {
            // Rediriger avec un message d'erreur si aucun supermarché ou type d'abonnement n'est sélectionné
            $_SESSION['error'] = "Veuillez sélectionner un supermarché et un type d'abonnement.";
           if(isset($_POST['valide'])){
            header("Location:../gerant/dashbord.php");  
            }else{
            header("Location:abonnement.php");
            }
            exit();
        }
    }
}
?>