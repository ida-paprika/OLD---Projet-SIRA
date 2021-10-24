


<main class="container-fluid" id="pageCommande">

	<section class="my-4">
		<div>
			<form action="" method="POST" class="form-group mt-4 row ml-1">
				<select name="agence" id="" class="form-control col-4">
					<?php foreach($listeAgences as $key => $value): ?>
						<option value="<?= $value['id_agence']; ?>"><?= $value['titre']; ?></option>
					<?php endforeach; ?>
				</select>
				<button type="submit" name="triAgence" class="btn btn-info"><i class="fa fa-check"></i></button>
			</form>
		</div>

		<div>
			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr class="text-center">
						<th class="align-middle">Commande</th>
						<th class="align-middle">Membre</th>
						<th class="align-middle">Véhicule</th>
						<th class="align-middle">Agence</th>
						<th class="align-middle">Date et heure de départ</th>
						<th class="align-middle">Date et heure de fin</th>
						<th class="align-middle">Prix total</th>
						<th class="align-middle">Date et heure d'enregistrement</th>
						<th class="align-middle">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listeCommandes as $key => $value): ?>
						<tr class="text-center">
							<td class="align-middle"><?= $value['id_commande']; ?></td>
							<td class="align-middle"><?= $value['idMembre']. " - " .$value['prenom']. " " .$value['nom']. " - " .$value['email']; ?></td>
							<td class="align-middle"><?= $value['idVehicule']. " - " .$value['nomVehicule']; ?></td>
							<td class="align-middle"><?= $value['idAgence']. " - " .$value['nomAgence']; ?></td>
							<td class="align-middle"><?= $value['date_heure_depart']; ?></td>
							<td class="align-middle"><?= $value['date_heure_fin']; ?></td>
							<td class="align-middle"><?= $value['prix_total']."€"; ?></td>
							<td class="align-middle"><?= $value['c_date_enregistrement']; ?></td>
							<td class="align-middle">
								<a href="" class="text-secondary"><i class="fa fa-search fa-lg"></i></a>
								<a href="?delete=<?= $value['id_commande']; ?>" class="text-danger"><i class="fa fa-trash fa-lg"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				
			</table>
		</div>
	</section>

	
</main>


