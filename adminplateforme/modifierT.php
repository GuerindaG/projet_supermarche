<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal" id="type<?php echo $affichage['id_type_abonnement'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-3" id="exampleModalLabel">Ajouter un Type d'Abonnement</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="updateT.php" method="POST" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="fullname" class="col-form-label">Type d'Abonnement</label>
                                    <input type="text" class="form-control" id="" name="type_abonnement" value="<?php echo $affichage['type_abonnement'] ?>"
                                        placeholder="Entrez le type d'Abonnement" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fullname" class="col-form-label">Nombre de mois</label>
                                    <input type="number" class="form-control" id="" name="nombre_jour" value="<?php echo $affichage['nombre_jour'] ?>"
                                        placeholder="Entrez le nombre de Mois" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fullname" class="col-form-label">Montant</label>
                                    <input type="number" class="form-control" id="" name="montant" value="<?php echo $affichage['montant'] ?>"
                                        placeholder="Entrez le montant" required />
                                </div>
                            </div>
                            <input type="hidden" name="id_type_abonnement" value="<?php echo $affichage['id_type_abonnement'] ?>">
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
</body>
</html>