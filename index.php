<?php

	include "z_fonctions.php";
	
	$listeAgences = listeAgences();
	$listeCommandes = listeCommandes();


 // - BARRE DE RESERVATION - 
	if(isset($_POST['valideVehicule'])){
		$agence = $_POST['agence'];

		$choixVehicule = choixVehicule($agence);


		// - NOMBRE DE VEHICULES PAR AGENCE -
        $query = "SELECT COUNT(*) FROM vehicule WHERE id_agence = $agence";

        $res = executionDeRequete($query)->fetchAll();

        $nbVehicules = $res[0][0];
        
	}

/*
if(isset($_POST['dateFin']) && isset($_POST['dateDebut'])){
	$actu_fin = strtotime($commande['date_heure_fin']) - strtotime($_POST['dateFin']);
	 
	$actu_debut =  strtotime($commande['date_heure_depart']) - strtotime($_POST['dateDebut']);
	 
	if($actu_fin < 0 AND $actu_debut > 0) {
	 
		$dispo = false;
	 
	} else {
		$dispo = true;
	}
}

// - DISPONIBILITES -
	function disponibilite($id_vehicule){

		$query = "SELECT DISTINCT id_vehicule, date_heure_depart, date_heure_fin
                FROM commande
                WHERE id_vehicule = :id_vehicule";

		$commande = executionDeRequete($query, [
                							"id_vehicule" => $id_vehicule,
                						])-> fetch();

		if(isset($_POST['dateFin']) && isset($_POST['dateDebut'])){
			$actu_fin = strtotime($commande['date_heure_fin']) - strtotime($_POST['dateFin']);
	 
			$actu_debut =  strtotime($commande['date_heure_depart']) - strtotime($_POST['dateDebut']);
	 
			if($actu_fin < 0 AND $actu_debut > 0){
	 
				return false;
	 
			} else {
				return true;
			}
		}
	}
*/		



// - DISPONIBILITES -
	function disponibilite($id_vehicule){
		$dateActu = date('Y-m-d');

		$query = "SELECT DISTINCT id_vehicule
                FROM commande
                WHERE id_vehicule = :id_vehicule
                AND date_heure_fin >= :dateActu";

		$commande = executionDeRequete($query, [
                							"id_vehicule" => $id_vehicule,
                							"dateActu" => $dateActu
                						]);

		if($commande -> rowCount()!== 0){
			return true;
		}else{
			return false;
		}
	}


// - REDIRECTION VERS RESERVATION
	if(isset($_GET['resaVehicule']) && ctype_digit($_GET['resaVehicule'])){

    	header("Location: reservation.php?dateDebut=$dateDebut?dateFin=$dateFin");

    	exit;

	}

 // - TRIER PAR (1) - 
	if(isset($_POST['check1']) && isset($_POST['trier1'])){	

		if($_POST['trier1'] == 'prixUp1'){
			
        	$query = "SELECT id_vehicule, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                	FROM vehicule as v, agences as a
                	WHERE v.id_agence = a.id_agence
                	ORDER BY prix_journalier ASC";

            $listeVehicules = executionDeRequete($query)->fetchAll();

		} 

		if($_POST['trier1'] == 'prixDown1'){

			$query = "SELECT id_vehicule, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                FROM vehicule as v, agences as a
                WHERE v.id_agence = a.id_agence
                ORDER BY prix_journalier DESC";

			$listeVehicules = executionDeRequete($query)->fetchAll();

		}

	} else {

		$listeVehicules = listeVehicules();
	}

 // - TRIER PAR (2) - 
	if(isset($_POST['check2']) && isset($_POST['trier2'])){	
		$agence = $_POST['agence'];
		
		if($_POST['trier2'] == 'prixUp2'){
			
        	$query = "SELECT id_vehicule, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                FROM vehicule as v, agences as a
                WHERE v.id_agence = a.id_agence
                AND v.id_agence = :agence
                ORDER BY prix_journalier ASC";

            $choixVehicule = executionDeRequete($query, [
                "agence" => $agence
        ])->fetchAll();

		} 

		if($_POST['trier2'] == 'prixDown2'){

			$query = "SELECT id_vehicule, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                FROM vehicule as v, agences as a
                WHERE v.id_agence = a.id_agence
                AND v.id_agence = :agence
                ORDER BY prix_journalier DESC";

			$choixVehicule = executionDeRequete($query, [
                "agence" => $agence
        ])->fetchAll();

		}

	}

// - NO RESA -
	if(isset($_POST['noResa'])){
		$message = "Veuillez sélectionner vos dates dans le bandeau ci-dessus";
	}


// - DECONNEXION -
    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }


	$template = "vues/vue_index.php";

	include "layout.php";

?>