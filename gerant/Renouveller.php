<?php
///////
//DATETIME
$fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
$date_actuelle = new DateTime("now",$fuseau_horaire);	

$sql3 = $connexion->prepare("SELECT i.*,a.*,t.* FROM abonnement AS a JOIN type_abonnement AS 
t ON a.id_type_abonnement = t.id_type_abonnement JOIN informationsm AS i ON i.id=a.id 
WHERE  a.id='$_SESSION[id]' ");
$sql3->execute();
$aff = $sql3->fetch(PDO::FETCH_ASSOC);
// var_dump($aff);
// die();
if($aff==true){
$date_debut_abonnement = $aff['date_abonnement']; // Date de début de l'abonnement
$nombre_jours_abonnement = $aff['nombre_jour']; // Nombre total de jours de l'abonnement
																

$debut_abonnement = new DateTime($date_debut_abonnement, $fuseau_horaire);
                                                                    
$debut_abonnement->add(new DateInterval("P{$nombre_jours_abonnement}D"));
															
$jour = $debut_abonnement -> format('Y-m-d H:i:s');

$fin = $aff['date_fin_abonnement'];
}
?>

<!--MODAL DES ABONNEMENTS-->
<div class="modal fade " id="renouveler" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-3" id="exampleModalLabel">S'abonner</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" action="..\adminplateforme\traittementA.php">
                        <div class="row">
                        <div class="text-center"><h4>Veuillez renouveller votre abonnement avant de poursuivre !</h4></div>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Type d'Abonnement</label>
                                    <select class="form-control wide" name="id_type_abonnement" id="">
                                        <option value="aucun">aucun </option>
                                        <?php
                                            $reqt = $connexion->prepare("SELECT*FROM type_abonnement");
                                            $reqt->execute();
                                            while($afff = $reqt->fetch()){
                                        ?>
                                            <option value="<?php echo $afff['id_type_abonnement'] ?>"><?php echo $afff['type_abonnement'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULER</button>
                            <button type="submit" name="valide" class="btn btn-primary">SOUMETTRE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>	
