    <!--MODAL DES ABONNEMENTS-->
            <div class="modal fade " id="abonnement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title fs-3" id="exampleModalLabel">S'abonner</h3>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="card-body">
								<form class="needs-validation" novalidate method="POST" action="..\adminplateforme\traittementA.php">
									<div class="row">
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
	<!--MODAL MESSAGE 1-->
	<?php
		if($_SESSION['etat']==false AND !isset($_SESSION['show']) AND $_SESSION['heure_fin'] !==NULL){
			$_SESSION['show'] =true;
	?>
	<div class="modal fade  " id="msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="card-body p-6">
						
							<h5>Vous avez <span id="timer"></span> de navigation gratuite sur la plateforme avant l'abonnement</h5>
							
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-bs-dismiss="modal" aria-label="Close" onClick="fermermodal();" class="btn btn-primary w-100">OK</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			modals = document.getElementById('msg');
			if(modals){
				afficheModal = new bootstrap.Modal(modals);
				afficheModal.show();
			}

		});
	</script>
	<?php
		}
	?>
	
	<!--MODAL MESSAGE 5min -->
	<div class="modal fade  " id="message" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
						<p>
							<h4>Voulez-vous vous abonnez?</h4>
						</p>
				</div>
				<div class=" modal-footer">
					<div class="row">
						<div class="col-lg-6 text-center"><button type="button" data-bs-dismiss="modal" onClick="fermermod();" class="btn btn-danger">Non</button></div>
						<div class="col-lg-6 text-center"><button type="button" data-bs-target="#abonnement" onClick="fermermod();" data-bs-toggle="modal" class="btn btn-primary">Oui</button></div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script>
        	document.addEventListener('DOMContentLoaded', function () {
            const endTime = new Date('<?php echo $_SESSION['heure_fin']; ?>').getTime();
            const timerElement = document.getElementById('heure');
			const timer_Element = document.getElementById('timer');

            function updateTimer() {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance < 0 ) {
                    clearInterval(timerInterval);
                    timerElement.innerHTML = "Temps écoulé";
					timer_Element.innerHTML = "épuisé";
						modale = document.getElementById('message');
						if(modale){
							affModal = new bootstrap.Modal(modale);
							affModal.show();
						}
                    return;
                }

                //const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                timerElement.innerHTML = "Abonnement gratuit: "+ minutes + "min" + seconds + "s";
				timer_Element.innerHTML =  minutes + "min" + seconds + "s";

            }
            const timerInterval = setInterval(updateTimer, 1000);
            updateTimer();
       		});
    </script>

	<script>
        // Étape 2 : Passer la variable de session PHP à JavaScript
        var dateFin = '<?php echo $jour; ?>';

        // Étape 3 : Initialiser le minuteur de compte à rebours
        function initialiserCompteRebours(dateFin) {
            var dateFin = new Date(dateFin).getTime();

            // Mettre à jour le compte à rebours toutes les 1 seconde
            var compteRebours = setInterval(function() {
                var maintenant = new Date().getTime();
                var distance = dateFin - maintenant;

                // Calculer le temps restant en mois, jours, heures, minutes et secondes
                var totalSeconds = Math.floor(distance / 1000);
                var mois = Math.floor(totalSeconds / (30 * 24 * 60 * 60)); // Approximation des mois
                totalSeconds %= (30 * 24 * 60 * 60);
                var jours = Math.floor(totalSeconds / (24 * 60 * 60));
                totalSeconds %= (24 * 60 * 60);
                var heures = Math.floor(totalSeconds / (60 * 60));
                totalSeconds %= (60 * 60);
                var minutes = Math.floor(totalSeconds / 60);
                var secondes = totalSeconds % 60;

                // Afficher le résultat dans l'élément avec id="countdown"
                document.getElementById("countdown").innerHTML = mois + "mois " + jours + "j " + heures + ":"
                + minutes + ":" + secondes;

                // Si le compte à rebours est terminé, afficher un message
                if (distance < 0) {
                    clearInterval(compteRebours);
                    document.getElementById("countdown").innerHTML = "EXPIRÉ";
						mod = document.getElementById('renouveler');
						if(mod){
							afficherMod = new bootstrap.Modal(mod);
							afficherMod.show();
						}
                }
            }, 1000);
        }

        // Initialiser le compte à rebours avec l'heure de fin
        initialiserCompteRebours(dateFin);
    </script>

