<div class="modal fade" id="rayon<?php echo $voir['id_rayon'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<form method="POST" action="updR.php">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un rayon</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row mb-2">
							<div class="col-lg-12">
								<label for="recipient-name" class="col-form-label">Nom du Rayon</label>
								<input type="text" name="nomR" value="<?php echo $voir['nomR'] ?>" placeholder="" class="form-control pop">
							</div>
                            <input type="hidden" name="id_rayon" value="<?php echo $voir['id_rayon'] ?>">
						</div>
						<div class="text-end">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
				<button type="submit"  class="btn btn-primary">Enregistrer</button>
			</div>
				</form>
			</div>
		</div>
</div>
