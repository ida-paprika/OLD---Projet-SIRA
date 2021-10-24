
<main class="container" id="pageIndex">
<?php if(!isAdmin()): ?>
	<?php if(isset($_POST['valideVehicule'])): ?>

		<section class="">
			<div class="mt-4 row">
				<?= '<p class="font-weight-bold h5 col-xs-12 col-md-3 col-lg-2"><span class="h2">'. $nbVehicules .'</span> résultats</p><hr>' ?>
				<form action="" method="POST" class="form-group justify-content-end col-xs-4 col-md-9 col-lg-10 row">
					<label for="" class="col-xs-4 col-md-3 text-xs-left text-md-right">Trier par :</label>
					<select name="trier2" id="" class="form-control col-xs-4 col-md-5">
						<option value="prixUp2" class="">Prix croissant</option>
						<option value="prixDown2" class="">Prix décroissant</option>
					</select>
					<button name="check2" class="btn btn-info"><i class="fa fa-check"></i></button>
				</form>
			</div>


			<div class="row my-2">
				<?php foreach($choixVehicule as $key => $value): ?>
					<article class="col-xs-12 col-md-6 col-lg-4 my-2">
						<div class="card m-auto" style="width: 18rem;">
				  			<img class="card-img-top" src="<?= 'img/'. $value['photoVehicule']; ?>" alt="Card image cap">
				  			<div class="card-body text-center">
				    			<h5 class="card-title"><?= $value['titreVehicule']; ?></h5>
				    			<p class="places card-text"><?= $value['descriptVehicule'] ?></p>
				    			<p class="tarif card-text"><?= $value['prix_journalier'] .'€ / jour'; ?></p>
				    			<p class="agence card-text"><?= $value['nomAgence']; ?></p>
								
								<?php if(disponibilite($value['id_vehicule'])): ?>
									<p class="btn btn-secondary">Indisponible à ces dates</p>
								<?php else: ?>
				    				<a href="reservation.php?resaVehicule=<?= intval($value['id_vehicule']); ?>&debutLoca=<?= date($_POST['dateDebut']); ?>&finLoca=<?= date($_POST['dateFin']); ?>" class="btn btn-primary">Réserver</a>
				    			<?php endif; ?>
				  			</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

		</section>

	<?php else: ?>
				    			
		<?= isset($message) ? '<p class="text-danger text-center h4"><i class="fa fa-exclamation-triangle"></i> '. $message .' <i class="fa fa-exclamation-triangle"></i></p>' : ''; ?>
		<section class="">
			<div class="mt-4">
				<form action="" method="POST" class="form-group justify-content-end row">
					<label for="" class="col-xs-4 col-md-2 text-xs-left text-md-right">Trier par :</label>
					<select name="trier1" id="" class="form-control col-xs-4 col-md-3">
						<option value="prixUp1" class="">Prix croissant</option>
						<option value="prixDown1" class="">Prix décroissant</option>
					</select>
					<button name="check1" class="btn btn-info"><i class="fa fa-check"></i></button>
				</form>
			</div>

			<div class="row my-2">
				<?php foreach($listeVehicules as $key => $value): ?>
					<article class="col-xs-12 col-md-6 col-lg-4 my-2">
						<div class="card m-auto" style="width: 18rem;">
				  			<img class="card-img-top" src="<?= 'img/'. $value['photoVehicule']; ?>" alt="Card image cap">
				  			<div class="card-body text-center">
				    			<h5 class="card-title"><?= $value['titreVehicule']; ?></h5>
				    			<p class="places card-text"><?= $value['descriptVehicule'] ?></p>
				    			<p class="tarif card-text"><?= $value['prix_journalier'] .'€ / jour'; ?></p>
				    			<p class="agence card-text"><?= $value['nomAgence']; ?></p>
				    			<form action="" method="post">
				    				<button class="btn btn-primary" name="noResa">Réserver</button>
				    			</form>

				  			</div>
						</div>
					</article>
				<?php endforeach; ?>

			</div>
		</section>
	<?php endif; ?>

<?php else: ?>
	<h2 class="text-center my-5"><i class="fa fa-cogs mr-3"></i>Session Administrateur<i class="fa fa-cogs fa-flip-horizontal ml-3"></i></h2>

	<hr>
	<section class="m-5 d-flex justify-content-center row">
		<a href="agence.php" class="btn btn-light border border-warning p-1 m-2 col-md-4 col-lg-2">Gérer les<br><span class="font-weight-bold h3">agences</span></a>
		<a href="vehicule.php" class="btn btn-light border border-warning p-1 m-2 col-md-4 col-lg-2">Gérer les<br><span class="font-weight-bold h3">véhicules</span></a>
		<a href="membre.php" class="btn btn-light border border-warning p-1 m-2 col-md-4 col-lg-2">Gérer les<br><span class="font-weight-bold h3">membres</span></a>
		<a href="commande.php" class="btn btn-light border border-warning p-1 m-2 col-md-4 col-lg-3">Gérer les<br><span class="font-weight-bold h3">commandes</span></a>
	</section>

<?php endif; ?>	
</main>

