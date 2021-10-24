


<main class="container-fluid" id="pageVehicule">

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
						<th class="align-middle">Véhicule</th>
						<th class="align-middle">Agence</th>
						<th class="align-middle">Titre</th>
						<th class="align-middle">Marque</th>
						<th class="align-middle">Modèle</th>
						<th class="align-middle">Description</th>
						<th class="align-middle">Photo</th>
						<th class="align-middle">Prix</th>
						<th class="align-middle">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listeVehicules as $key => $value): ?>
						<tr class="text-center">
							<td class="align-middle"><?= $value['id_vehicule']; ?></td>
							<td class="align-middle"><?= $value['nomAgence']; ?></td>
							<td class="align-middle"><?= $value['titreVehicule']; ?></td>
							<td class="align-middle"><?= $value['marque']; ?></td>
							<td class="align-middle"><?= $value['modele']; ?></td>
							<td class="align-middle"><?= $value['descriptVehicule']; ?></td>
							<td>
								<?= '<img src="img/'. $value['photoVehicule'] .'" alt="">'; ?>
							</td>
							<td class="align-middle"><?= $value['prix_journalier']."€"; ?></td>
							<td class="align-middle">
								<a href="" class="text-secondary"><i class="fa fa-search fa-lg"></i></a>
								<a href="?editVehicule=<?= $value['id_vehicule']; ?>" id="<?= $value['id_vehicule']; ?>" class="text-primary"><i class="fa fa-edit fa-lg"></i></a>
								<a href="?delete=<?= $value['id_vehicule']; ?>" class="text-danger"><i class="fa fa-trash fa-lg"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>

	<hr>

	<section class="container">
		<div>
			<form action="" method="post" enctype="multipart/form-data" class="form-group row">
				<div class="col-6">
					<div class="my-3">
						<label for="" class="">Titre</label>
						<input type="text" name="titre" class="form-control" value="<?= isset($vehiculeModif) ? $vehiculeModif['titre'] : ''; ?>" required>
					</div>
					<div class="my-3">
						<label for="" class="">Marque</label>
						<input type="text" name="marque" class="form-control" value="<?= isset($vehiculeModif) ? $vehiculeModif['marque'] : ''; ?>" required>
					</div>
					<div class="my-3">
						<label for="" class="">Modèle</label>
						<input type="text" name="modele" class="form-control" value="<?= isset($vehiculeModif) ? $vehiculeModif['modele'] : ''; ?>" required>
					</div>
					<div class="my-3">
						<label for="" class="">Prix</label>
						<input type="text" name="prix" class="form-control" value="<?= isset($vehiculeModif) ? $vehiculeModif['prix_journalier'] : ''; ?>" required>
					</div>
				</div>
				
				<div class="col-6">
					<div class="my-3">
						<label for="" class="">Photo</label>
						<input type="file" name="photo" accept="image/*" class="form-control" value="" <?= !isset($vehiculeModif) ? 'required' : ''; ?>>
						<?php if(isset($vehiculeModif)): ?>
							<?= '<img src="img/'. $vehiculeModif['photo'] .'" class="w-50 border border-dark">' ?>
							<input type="hidden" name="nomPhoto" value="<?= $vehiculeModif['photo']; ?>">
						<?php endif; ?>
					</div>
					<div class="my-3">
						<label for="" class="">Description</label>
						<textarea name="descript" id="" cols="30" class="form-control" value="<?= isset($vehiculeModif) ? $vehiculeModif['description'] : ''; ?>" required><?= isset($vehiculeModif) ? $vehiculeModif['description'] : ''; ?></textarea>
					</div>
					<?php if( !isset($_GET['editVehicule'])): ?>
						<div class="my-3">
							<label for="" class="">Agence</label>
							<select name="agence" id="" class="form-control col-5" required>
								<?php foreach($listeAgences as $key => $value): ?>
									<option value="<?= $value['id_agence']; ?>"><?= $value['titre']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-12 my-3 text-center">
					<?php if(isset($vehiculeModif)): ?>
						<input type="submit" name="edit" value="Mettre à jour" class="btn btn-success">
					<?php else: ?>
						<input type="submit" name="ajout" value="Enregistrer" class="btn btn-primary">
					<?php endif; ?>
				</div>
				
			</form>
		</div>
	</section>
	
</main>


