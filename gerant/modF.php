<!--MODAL AJOUT FOURNISSEURS-->
<div class="modal fade" id="fournisseur<?php echo $affichage['id_fournisseur'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau fournisseur</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
								<form action="updF.php" method="POST">
									<?php if(!empty($affichage['rccm'])){ ?>
									<div class="col-sm-12">
										<label for="recipient-name" class="col-form-label">Nom de l'entreprise</label>
										<input type="text" placeholder="Entrez votre nom" name="nom" value="<?php echo $affichage['nom'] ?>"
											class="form-control pop">
									</div>
									<div class="row mb-2">
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">IFU</label>
											<input type="number" placeholder="Entrez votre IFU" name="ifu" value="<?php echo $affichage['ifu'] ?>"
												class="form-control pop">
										</div>
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">RCCM</label>
											<input type="number" placeholder="Entrez votre RCCM" name="rccm" value="<?php echo $affichage['rccm'] ?>"
												class="form-control pop">
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-sm-12">
											<label for="recipient-name" class="col-form-label">Adresse Email</label>
											<input type="email" placeholder="Entrez votre adresse email" name="email" value="<?php echo $affichage['email'] ?>"
												class="form-control pop">
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">Contact</label>
											<input type="tel" placeholder="	Entrez votre contact" name="contact" value="<?php echo $affichage['contact'] ?>"
												class="form-control pop">
										</div>
										<div class="col-sm-6">
											<label for="recipient-name" class="col-form-label">Adresse</label>
											<input type="text" placeholder="Entrez votre adresse" name="adresse" value="<?php echo $affichage['adresse'] ?>"
												class="form-control pop">
										</div>
                                    <input type="hidden" name="id_fournisseur" value="<?php echo $affichage['id_fournisseur'] ?>" >
									</div>
									<?php }else{ ?>
									
										<div class="col-sm-12">
											<label for="recipient-name" class="col-form-label">Nom </label>
											<input type="text" placeholder="Entrez votre nom" name="nom" value="<?php echo $affichage['nom'] ?>"
												class="form-control pop">
										</div>
										<div class="row mb-2">
											<div class="col-sm-6">
												<label for="recipient-name" class="col-form-label">IFU</label>
												<input type="number" placeholder="Entrez votre IFU" name="ifu" value="<?php echo $affichage['ifu'] ?>"
													class="form-control pop">
											</div>
											<div class="col-sm-6">
												<label for="recipient-name" class="col-form-label">Contact</label>
												<input type="tel" placeholder="Entrez votre contact" name="contact" value="<?php echo $affichage['contact'] ?>"
													class="form-control pop">
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-sm-12">
												<label for="recipient-name" class="col-form-label">Adresse Email</label>
												<input type="email" placeholder="Entrez votre adresse email" name="email" value="<?php echo $affichage['email'] ?>"
													class="form-control pop">
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-sm-12">
												<label for="recipient-name" class="col-form-label">Adresse</label>
												<input type="text" placeholder="Entrez votre adresse" name="adresse" value="<?php echo $affichage['adresse'] ?>"
													class="form-control pop">
											</div>
                                        <input type="hidden" name="id_fournisseur" value="<?php echo $affichage['id_fournisseur'] ?>">
										</div>
										<?php
									 }?>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
									<input type="submit" name="valider" class="btn btn-primary"></div>
								</form>
						

					</div>
			</div>
		</div>
	</div>