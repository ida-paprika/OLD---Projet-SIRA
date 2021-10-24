

<main class="container my-4" id="pageConnexion">

	<div class="row justify-content-around">

<!-- - INSCRIPTION - -->
		<section class="col-xs-10 col-md-5">
			<h3 class="text-center mb-3">S'inscrire</h3>
			<div class="bloc1 border border-secondary rounded">
				<div class="px-5 py-3">
					<form action="" method="POST" class="formgroup">
						<div class="input-group my-4">
							<div class="input-group-prepend">
	          					<span class="input-group-text" id=""><i class="fa fa-user"></i></span>
	        				</div>
							<input type="text" name="pseudoI" placeholder="Votre pseudo" class="form-control" aria-describedby="inputGroupPrepend1" required>
						</div>
						<?= isset($pseudoPris) ? '<p class="text-danger text-center bg-light"><i class="fa fa-exclamation-triangle"></i> '. $pseudoPris .' <i class="fa fa-exclamation-triangle"></i></p>' : ''; ?>

						<div class="input-group my-4">
							<div class="input-group-prepend">
          						<span class="input-group-text" id=""><i class="fa fa-lock"></i></span>
        					</div>
							<input type="password" name="mdpI" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}" title="Veuillez saisir un mot de passe de 4 à 8 caractères, contenant au moins 1 chiffre, 1 minuscule et 1 majuscule." placeholder="Votre mot de passe" class="form-control" aria-describedby="inputGroupPrepend2" required>
						</div>

						<div class="input-group my-4">
							<div class="input-group-prepend">
          						<span class="input-group-text" id=""><i class="fa fa-toilet"></i></span>
        					</div>
							<input type="text" name="nom" placeholder="Votre nom" class="form-control" aria-describedby="inputGroupPrepend3" required>
						</div>

						<div class="input-group my-4">
							<div class="input-group-prepend">
          						<span class="input-group-text" id=""><i class="fa fa-poo"></i></span>
        					</div>
							<input type="text" name="prenom" placeholder="Votre prénom" class="form-control" aria-describedby="inputGroupPrepend4" required>
						</div>

						<div class="input-group my-4">
							<div class="input-group-prepend">
          						<span class="input-group-text" id=""><i class="fa fa-at"></i></span>
        					</div>
							<input type="mail" name="email" placeholder="Votre email" class="form-control" aria-describedby="inputGroupPrepend5" required>
						</div>

						<div class="input-group my-4">
							<div class="input-group-prepend">
          						<span class="input-group-text" id=""><i class="fa fa-venus-mars"></i></span>
        					</div>
							<select name="civilite" id="" class="form-control" aria-describedby="inputGroupPrepend6" required>
								<option value="f">Femme</option>
								<option value="m">Homme</option>
							</select>
						</div>

						<div class="text-center my-4">
							<input type="submit" name="inscript" value="Inscription" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
			
		</section>

<!-- - CONNEXION - -->
		<section class="col-xs-10 col-md-5">
			<h3 class="text-center mb-3">Se connecter</h3>
			<div class="bloc2 border border-secondary rounded">
				<div class="px-5 py-3">
					<form action="" method="POST" class="formgroup">
						<div class="input-group my-4">
							<div class="input-group-prepend">
	          					<span class="input-group-text" id=""><i class="fa fa-user"></i></span>
	        				</div>
							<input type="text" name="pseudo" placeholder="Votre pseudo" class="form-control" aria-describedby="inputGroupPrepend1" required>
						</div>

						<div class="input-group my-4">
							<div class="input-group-prepend">
          						<span class="input-group-text" id=""><i class="fa fa-lock"></i></span>
        					</div>
							<input type="password" name="mdp" placeholder="Votre mot de passe" class="form-control" aria-describedby="inputGroupPrepend2" required>
						</div>
						
						<div class="text-center my-4">
							<input type="submit" name="connex" value="Connexion" class="btn btn-primary">
						</div>
						<?= isset($message) ? '<p class="text-danger text-center bg-light"><i class="fa fa-exclamation-triangle"></i> '. $message .' <i class="fa fa-exclamation-triangle"></i></p>' : ''; ?>
					</form>
				</div>
			</div>
		</section>
	</div>

</main>


