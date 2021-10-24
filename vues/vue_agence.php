


<main class="container-fluid" id="pageAgence">

	<section class="my-4">
		<div>
			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr class="text-center">
						<th class="align-middle">Agence</th>
						<th class="align-middle">Titre</th>
						<th class="align-middle">Adresse</th>
						<th class="align-middle">Ville</th>
						<th class="align-middle">CP</th>
						<th class="align-middle">Description</th>
						<th class="align-middle">Photo</th>
						<th class="align-middle">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listeAgences as $key => $value): ?>
						<tr class="text-center">
							<td class="align-middle"><?= $value['id_agence']; ?></td>
							<td class="align-middle"><?= $value['titre']; ?></td>
							<td class="align-middle"><?= $value['adresse']; ?></td>
							<td class="align-middle"><?= $value['ville']; ?></td>
							<td class="align-middle"><?= $value['cp']; ?></td>
							<td class="align-middle"><?= $value['description']; ?></td>
							<td>
								<?= '<img src="img/'. $value['photo'] .'" alt="">'; ?>
							</td>
							<td class="align-middle">
								<a href="" class="text-secondary"><i class="fa fa-search fa-lg"></i></a>
								<a href="?editAgence=<?= $value['id_agence']; ?>" id="<?= $value['id_agence']; ?>" class="text-primary"><i class="fa fa-edit fa-lg"></i></a>
								<a href="?delete=<?= $value['id_agence']; ?>" class="text-danger"><i class="fa fa-trash fa-lg"></i></a>
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
			<form action="" method="POST" enctype="multipart/form-data" class="form-group row">
				<div class="col-6">
					<div class="my-3">
						<label for="" class="">Titre</label>
						<input type="text" name="titre" class="form-control" value="<?= isset($agenceModif) ? $agenceModif['titre'] : ''; ?>" required>
					</div>
					<div class="my-3">
						<label for="" class="">Description</label>
						<textarea name="descript" id="" cols="30" class="form-control" value="<?= isset($agenceModif) ? $agenceModif['description'] : ''; ?>" required><?= isset($agenceModif) ? $agenceModif['description'] : ''; ?>
						</textarea>
					</div>
					<div class="my-3">
						<label for="" class="">Photo</label>
						<input type="file" name="photo" accept="image/*" class="form-control" value="" <?= !isset($agenceModif) ? 'required' : ''; ?>>
						<?php if(isset($agenceModif)): ?>
							<?= '<img src="img/'. $agenceModif['photo'] .'" class="w-50 border border-dark">'; ?>
							<input type="hidden" name="nomPhoto" value="<?= $agenceModif['photo']; ?>">
						<?php endif; ?>
					</div>
				</div>
				
				<div class="col-6">
					<div class="my-3">
						<label for="" class="">Adresse</label>
						<input type="text" name="adresse" class="form-control" value="<?= isset($agenceModif) ? $agenceModif['adresse'] : ''; ?>" required>
					</div>
					<div class="my-3">
						<label for="" class="">Ville</label>
						<input type="text" name="ville" class="form-control" value="<?= isset($agenceModif) ? $agenceModif['ville'] : ''; ?>" required>
					</div>
					<div class="my-3">
						<label for="" class="">CP</label>
						<input type="text" name="cp" class="form-control" value="<?= isset($agenceModif) ? $agenceModif['cp'] : ''; ?>" required>
					</div>
					
				</div>

				<div class="col-12 my-3 text-center">
					<?php if(isset($agenceModif)): ?>
						<input type="submit" name="edit" value="Mettre à jour" class="btn btn-success">
					<?php else: ?>
						<input type="submit" name="ajout" value="Enregistrer" class="btn btn-primary">
					<?php endif; ?>
				</div>
				
			</form>
		</div>
	</section>
	
</main>

