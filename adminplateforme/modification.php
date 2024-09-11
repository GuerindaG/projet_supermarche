<div class="modal fade" id="sm<?php echo $aff['id'] ?>" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
                <?php
            if (isset($_SESSION['alertMessage'])) {
                echo "<script type='text/javascript'>alert('" . $_SESSION['alertMessage'] . "');</script>";
                unset($_SESSION['alertMessage']);
            }
            ?>
            <form class="needs-validation" method="POST" action="update.php" novalidate enctype="multipart/form-data" >
                <div class="modal-content p-4">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nom du Supermarché</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" value="<?php echo $aff['nom'] ?>"
                                        required />
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $aff['id'] ?>" >
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">IFU</label>
                                    <input type="number" class="form-control" name="ifu" placeholder="Entrez votre IFU" value="<?php echo $aff['ifu'] ?>"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="fulltext" class="form-label">RCCM</label>
                                    <input type="number" class="form-control" name="rccm" placeholder="Entrez votre RCCM" value="<?php echo $aff['rccm'] ?>"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Entrez votre email" value="<?php echo $aff['email'] ?>"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="number" class="form-label">Contact</label>
                                    <input type="tel" class="form-control" name="contact" value="<?php echo $aff['contact'] ?>"
                                        placeholder="Entrez votre contact" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="url" class="form-label">Site Web</label>
                                    <input type="url" class="form-control" name="siteweb" value="<?php echo $aff['siteweb'] ?>"
                                        placeholder="Entrez votre contact" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="fulltext" class="form-label">Localisation</label>
                                    <input type="text" class="form-control" name="localisation" value="<?php echo $aff['localisation'] ?>"
                                        placeholder="Entrez votre localisation" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="recipient-name" class="col-form-label">Logo du supermarché</label>
                                <input type="file" name="logo" value="<?php echo $aff['logo'] ?>" placeholder="Choisir votre Logo" class="form-control pop">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $aff['id'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer  text-end">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-primary w-100">ANNULER</button>
                        <button type="submit" class="btn btn-primary w-100">SOUMETTRE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>