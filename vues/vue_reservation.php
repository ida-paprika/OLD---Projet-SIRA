


<main class="container" id="pageReservation">
	<h3 class="text-center my-4">Veuillez compléter votre réservation :</h3>

	<section>
		<h5 class="text-secondary">Véhicule sélectionné :</h5>
		

			<article class="row">
				<div class="col-xs-10 col-md-6 col-lg-3 ml-auto">
					<img class="w-100 border border-light rounded" src="img/<?= isset($resaVehicule) ? $resaVehicule['photoVehicule'] : ''; ?>" alt="image cap">
				</div>
		  	
		  		<div class="text-center col-xs-10 col-md-6 col-lg-3 mr-auto">
		    		<h5 class=""><?= isset($resaVehicule) ? $resaVehicule['titreVehicule'] : ''; ?></h5>
		    		<p class="places"><?= isset($resaVehicule) ? $resaVehicule['descriptVehicule'] : ''; ?></p>
		    		<p class="tarif"><?= isset($resaVehicule) ? $resaVehicule['prix_journalier'] .'€ / jour' : ''; ?></p>
		    		<p class="agence"><?= isset($resaVehicule) ? $resaVehicule['nomAgence'] : ''; ?></p>
		  		</div>
			</article>
	</section>
<!-- 	<hr>
	<section>
		

		<form action="" method="post" class="form-group row">
			<div class="my-4 col-xs-10 col-md-6">
				<label for="" class="text-secondary h5">Début de location :</label>
				<input type="date" name="dateDebut" value="<?= isset($_GET['debutLoca']) ? $debutLoca : ''; ?>" class="form-control">
			</div>

			<div class="my-4 col-xs-10 col-md-6">
				<label for="" class="text-secondary h5">Fin de location :</label>
				<input type="date" name="dateFin" value="<?= isset($_GET['finLoca']) ? $finLoca : ''; ?>" class="form-control">
			</div>
			
			<div class="text-center col-12">

				<button type="submit" name="dispo" class="btn btn-primary">Voir les disponibilités</button>

				
			</div>
			
		</form>
	</section> -->
	<hr>


		<section>
			<h5 class="text-secondary">Récapitulatif de la commande :</h5>
			<div>
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr class="text-center">
							<th class="align-middle">Véhicule</th>
							<th class="align-middle">Agence</th>
							<th class="align-middle">Prix Journalier</th>
							<th class="align-middle">Date de début</th>
							<th class="align-middle">Date de fin</th>
							<th class="align-middle">Nombre de jours</th>
							<th class="align-middle">Prix total</th>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
							<td class="align-middle"><?= $resaVehicule['titreVehicule']; ?></td>
							<td class="align-middle"><?= $resaVehicule['nomAgence']; ?></td>
							<td class="align-middle"><?= $resaVehicule['prix_journalier'] .'€' ?></td>
							<td class="align-middle"><?= $debutLoca ?></td>
							<td class="align-middle"><?= $finLoca ?></td>
							<td class="align-middle"><?= $interval; ?></td>
							<td class="align-middle"><?= $resaVehicule['prix_journalier'] * $interval .'€'; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<form action="" method="post">
				<div class="text-center my-2">
					<button type="submit" name="validPay" class="btn btn-success">Valider et Payer</button>
				</div>
			</form>
			
		</section>

	
</main>


