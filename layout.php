<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Projet Sira</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" 
    crossorigin="anonymous">
    <script
          src="https://code.jquery.com/jquery-3.4.1.js"
          integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
          crossorigin="anonymous">
    </script>

<!-- DASHBOARD BS -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="dashboard_BS/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>

	<header class="container-fluid p-0">
		<section class="">
			<div class="titre text-center text-dark py-3">
				<h1 class="display-4">Bienvenue à bord</h1>
				<a href="index.php" class="d-block"><i class="fa fa-car fa-3x text-dark"></i></a>
				<p class="h4 pt-2">Location de voiture 24h/24 et 7j/7</p>
			</div>
			<nav class="nav nav-pills justify-content-around py-4">
				<?php if(!isConnected() ): ?>
					<a href="connexion.php" class="nav-link border border-white text-white">Inscription | Connexion</a>
					<a href="index.php" class="nav-link border border-white text-white">Accueil</a>
				<?php else: ?>
					<a href="<?= isAdmin() ? 'dashboard_index.php' : '';  ?>" class="nav-link border border-white text-white">Mon compte</a>
					<?php if(isConnected() && isAdmin()): ?>
						<a href="agence.php" class="nav-link border border-white text-white">Agences</a>
						<a href="vehicule.php" class="nav-link border border-white text-white">Véhicules</a>
						<a href="membre.php" class="nav-link border border-white text-white">Membres</a>
						<a href="commande.php" class="nav-link border border-white text-white">Commandes</a>
					<?php endif; ?>
					<?php if(isConnected() && !isAdmin()): ?>
						<a href="compte_membre.php" class="nav-link border border-white text-white">Mes réservations</a>
					<?php endif; ?>
					<a href="?action=deconnexion" class="nav-link border border-white text-white">Déconnexion</a>
		        <?php endif; ?>
			</nav>
		</section>

<!-- BARRE DE RESERVATION -->
		<?php if( !isAdmin() ): ?>
			<section class="container">
				<form action="" method="POST" class="resa form-group row">
					<div class="col-xs-12 col-md-3">
						<label for="" class="mb-0"><i class="fa fa-map-marker mr-2"></i>Ville de départ</label>
						<select name="agence" id="" value="<?php isset($_POST['agence']) ? $_POST['agence'] : ''; ?>" class="form-control" required>
							<?php foreach($listeAgences as $key => $value): ?>
								<option value="<?= $value['id_agence']; ?>" <?= (isset($_POST['agence']) && $_POST['agence'] === $value['id_agence']) ? 'selected' : ''; ?>><?= $value['ville'] .' ('. $value['cp'] .')'; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-xs-12 col-md-3">
						<label for="" class="mb-0"><i class="fa fa-calendar mr-2"></i>Début de location</label>
						<input type="date" name="dateDebut" value="<?= isset($_POST['dateDebut']) ? $_POST['dateDebut'] : ''; ?>" class="form-control" required>
					</div>

					<div class="col-xs-12 col-md-3">
						<label for="" class="mb-0"><i class="fa fa-calendar mr-2"></i>Fin de location</label>
						<input type="date" name="dateFin"  value="<?= isset($_POST['dateFin']) ? $_POST['dateFin'] : ''; ?>" class="form-control" required>
					</div>
					
					<input type="submit" name="valideVehicule" value="Valider un véhicule" class="btn btn-success col-xs-12 col-md-3">
				</form>
			</section>
		<?php endif; ?>
	</header>



	
	<?php include $template; ?>





	<footer class="container-fluid">
		<div class="text-center d-flex justify-content-around">
			<a href="" class="text-white py-3">Mentions légales</a>
			<a href="" class="text-white py-3">Conditions générales de ventes si le client accorde sa confiance à ARNO</a>
			<p class="text-white py-3">2020 - Locations Sira - Tous droits réservés</p>
		</div>
	</footer>

<!-- <script type="text/javascript" src="js/script.js"></script> -->
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dashboard_BS/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dashboard_BS/dist/assets/demo/chart-area-demo.js"></script>
        <script src="dashboard_BS/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dashboard_BS/dist/assets/demo/datatables-demo.js"></script>
</body>
</html>