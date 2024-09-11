<div class="modal fade" id="ajout<?php echo($aff['id_abonnement'] ) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-3" id="exampleModalLabel">S'abonner</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="updateA.php">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="fullname" class="col-form-label">Supermarché</label>
                                        <input type="text" disabled class="form-control"  name="id" value="<?php echo($aff['nom'] ) ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Type d'Abonnement</label>
                                        <select class="form-control wide" name="id_type_abonnement" value="<?php echo($aff['id_type_abonnement'] ) ?>">
                                            <?php
                                            //CHAMP SELECT TYPE ABONNEMENT
                                            $sql_abonnement_type=$conn->prepare("SELECT*FROM type_abonnement ORDER BY date_ajout DESC");
                                            $sql_abonnement_type->execute();
                                                while($data_type_abonnement = $sql_abonnement_type->fetch()){   
                                            ?>
                                            <option value="<?php echo $data_type_abonnement['id_type_abonnement']?>"><?php echo $data_type_abonnement['type_abonnement']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <input type="hidden" name="id_abonnement" value="<?php echo($aff['id_abonnement'] ) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULER</button>
                                <button type="submit" class="btn btn-primary">SOUMETTRE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>