<?php

	include "z_fonctions.php";

	$listeAgences = listeAgences();

	if( !empty($_GET['resaVehicule']) ){

		$query = "SELECT id_vehicule, v.id_agence as id_agence, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                FROM vehicule as v, agences as a
                WHERE v.id_agence = a.id_agence
				AND id_vehicule = :idVehicule";

		$res = executionDeRequete($query, array(
            "idVehicule" => $_GET['resaVehicule']
        ));

        $resaVehicule = $res -> fetch();
 	}

// - RECUPERATION DES DATES -
 	if(!empty($_GET['debutLoca']) && !empty($_GET['finLoca'])){
 		$debutLoca = $_GET['debutLoca'];
 		$finLoca = $_GET['finLoca'];
		// - INTERVAL DATES -
 		$interval = ( strtotime($finLoca) - strtotime($debutLoca) )/60/60/24;

 	}

// - RESERVER ET PAYER -
 	if(isset($_POST['validPay'])){
 		if(!isset($_SESSION['membre'])){
 			header("location: connexion.php");
 			exit;
 		}else{
	 		$membre = $_SESSION['membre']['id_membre'];
	 		$vehicule = $_GET['resaVehicule'];
	 		$agence = $resaVehicule['id_agence'];
	 		$dateDebut = $_GET['debutLoca'];
	 		$dateFin = $_GET['finLoca'];
	 		$prixTotal = $resaVehicule['prix_journalier'] * $interval;

	 		ajoutCommande($membre, $vehicule, $agence, $dateDebut, $dateFin, $prixTotal);
	 		
 		}
 	}

	
// - DECONNEXION -
    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }

	$template = "vues/vue_reservation.php";

	include "layout.php";


?>