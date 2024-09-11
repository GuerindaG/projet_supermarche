<!--MODAL DES ABONNEMENTS-->
		<?php
			if($_SESSION['etat']==false && $_SESSION['heure_fin']==NULL){
		?>
			<div class="modal fade show" id="abn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<form class="needs-validation" novalidate method="POST" action="..\adminplateforme\traittementA.php">
							<div class="modal-header">
								<h3 class="modal-title fs-3" id="exampleModalLabel">S'abonner</h3>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="card-body">
										<div class="row">
											<div class="text-center"><h4>Veuillez vous abonner avant de poursuivre !</h4></div>
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
											<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">ANNULER</button>
											<button type="submit" name="valide" class="btn btn-primary">SOUMETTRE</button>
										</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
		<script>
		document.addEventListener('DOMContentLoaded', function () {
			modal = document.getElementById('abn');
			if(modal){
				afficherModal = new bootstrap.Modal(modal);
				afficherModal.show();
			}

		});
		</script>
	<?php
		}
	?>