<?php

	include "z_fonctions.php";

	$countAgences = countItem('agences');

	$countVehicules = countItem('vehicule');

	$countMembres = countItem('membre');

	$countCommandes = countItem('commande');




    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }

	$template = "dashboard_BS/dist/index.phtml";

	include "layout.php";

?>