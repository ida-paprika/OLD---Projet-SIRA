<?php

	include "z_fonctions.php";

	$listeAgences = listeAgences();


	$commandesMembre = commandesMembre($_SESSION['membre']['id_membre']);

	$currentDateTime = date('Y-m-d');





	
// - DECONNEXION -
    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }

	$template = "vues/vue_compte_membre.php";

	include "layout.php";


?>