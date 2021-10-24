
<main class="container-fluid">
	
	<section>
		<h2>Historique des commandes</h2>
		<hr>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<tr class="text-center">
					<th class="align-middle">Location</th>
					<th class="align-middle">Véhicule</th>
					<th class="align-middle">Agence</th>
					<th class="align-middle">Date de début</th>
					<th class="align-middle">Date de fin</th>
					<th class="align-middle">Prix total</th>
					<th class="align-middle">Nombre de jours</th>
					<th class="align-middle">Statut</th>
					<th class="align-middle">Action</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($commandesMembre as $key => $value): ?>
					<tr class="text-center">
						<td class="align-middle"></td>
						<td class="align-middle"><?= $value['nomVehicule']; ?></td>
						<td class="align-middle"><?= $value['nomAgence']; ?></td>
						<td class="align-middle"><?= $value['date_heure_depart']; ?></td>
						<td class="align-middle"><?= $value['date_heure_fin']; ?></td>
						<td class="align-middle"><?= $value['prix_total']; ?></td>
						<td class="align-middle"><?= ( strtotime($value['date_heure_fin']) - strtotime($value['date_heure_depart']) )/60/60/24; ?></td>
						<td class="align-middle"><?= $currentDateTime > $value['date_heure_fin'] ? 'Terminé' : 'En cours'; ?></td>
						<td class="align-middle"></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section>



</main>