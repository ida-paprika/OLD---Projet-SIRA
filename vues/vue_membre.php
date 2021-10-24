


<main class="container-fluid" id="pageMembre">

	<section class="my-4">
		<div>
			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr class="text-center">
						<th class="align-middle">id membre</th>
						<th class="align-middle">Pseudo</th>
						<th class="align-middle">Prenom</th>
						<th class="align-middle">Nom</th>
						<th class="align-middle">Email</th>
						<th class="align-middle">Civilité</th>
						<th class="align-middle">Statut</th>
						<th class="align-middle">Date d'enregistrement</th>
						<th class="align-middle">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listeMembres as $key => $value): ?>
						<tr class="text-center">
							<td class="align-middle"><?= $value['id_membre']; ?></td>
							<td class="align-middle"><?= $value['pseudo']; ?></td>
							<td class="align-middle"><?= $value['prenom']; ?></td>
							<td class="align-middle"><?= $value['nom']; ?></td>
							<td class="align-middle"><?= $value['email']; ?></td>
							<td class="align-middle"><?= $value['civilite']; ?></td>
							<td class="align-middle"><?= $value['statut']; ?></td>
							<td class="align-middle"><?= $value['date_enregistrement']; ?></td>
							<td class="align-middle">
								<a href="" class="text-secondary"><i class="fa fa-search fa-lg"></i></a>
								<a href="" id="" class="text-primary"><i class="fa fa-edit fa-lg"></i></a>
								<a href="?delete=<?= $value['id_membre']; ?>" class="text-danger"><i class="fa fa-trash fa-lg"></i></a>
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
			<form action="" method="POST" class="form-group row">
				<div class="col-6">
					<div class="input-group my-4">
						<label for="" class="w-100">Pseudo</label>
        				<div class="input-group-prepend">
          					<span class="input-group-text" id=""><i class="fa fa-user"></i></span>
        				</div>
        				<input type="text" name="pseudo" class="form-control" id="" placeholder="pseudo" aria-describedby="inputGroupPrepend2">
      				</div>
					<div class="input-group my-4">
						<label for="" class="w-100">Mot de passe</label>
        				<div class="input-group-prepend">
          					<span class="input-group-text" id=""><i class="fa fa-lock"></i></span>
        				</div>
        				<input type="text" name="mdp" class="form-control" id="" placeholder="mot de passe" aria-describedby="inputGroupPrepend2">
      				</div>
					<div class="input-group my-4">
						<label for="" class="w-100">Nom</label>
        				<div class="input-group-prepend">
          					<span class="input-group-text" id=""><i class="fa fa-pen"></i></span>
        				</div>
        				<input type="text" name="nom" class="form-control" id="" placeholder="votre nom" aria-describedby="inputGroupPrepend2">
      				</div>
					<div class="input-group my-4">
						<label for="" class="w-100">Prénom</label>
        				<div class="input-group-prepend">
          					<span class="input-group-text" id=""><i class="fa fa-pen"></i></i></span>
        				</div>
        				<input type="text" name="prenom" class="form-control" id="" placeholder="votre prénom" aria-describedby="inputGroupPrepend2">
      				</div>
				</div>
				
				<div class="col-6">
					<div class="input-group my-4">
						<label for="" class="w-100">Email</label>
        				<div class="input-group-prepend">
          					<span class="input-group-text" id=""><i class="fa fa-envelope"></i></span>
        				</div>
        				<input type="text" name="mail" class="form-control" id="" placeholder="votre email" aria-describedby="inputGroupPrepend2">
      				</div>
					<div class="my-4">
						<label for="" class="">Civilité</label>
						<select name="civilite" id="" class="form-control">
							<option value="f">Femme</option>
							<option value="m">Homme</option>
						</select>
					</div>
					<div class="my-4">
						<label for="" class="">Statut</label>
						<select name="statut" id="" class="form-control">
							<option value="admin">Admin</option>
							<option value="membre">Membre</option>
						</select>
					</div>
					
				</div>

				<div class="col-12 my-3 text-center">
					<input type="submit" value="Enregistrer" class="btn btn-primary">
				</div>
				
			</form>
		</div>
	</section>
	
</main>


