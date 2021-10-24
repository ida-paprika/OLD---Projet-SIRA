<?php

	include "z_fonctions.php";
	
	$listeAgences = listeAgences();
	
	$listeCommandes = listeCommandes();

// - TRIER PAR AGENCE -
    if(isset($_POST['triAgence'])){

        $agence = $_POST['agence'];

        $listeCommandes = executionDeRequete("SELECT id_commande, c.id_membre as idMembre, nom, prenom, email, c.id_vehicule as idVehicule, v.titre as nomVehicule, c.id_agence as idAgence, a.titre as nomAgence, date_heure_depart, date_heure_fin, prix_total, c.date_enregistrement as c_date_enregistrement 
                FROM commande as c, membre as m, vehicule as v, agences as a 
                WHERE c.id_agence = a.id_agence 
                AND c.id_membre = m.id_membre 
                AND c.id_vehicule = v.id_vehicule
                AND c.id_agence = :id_agence", [
                    "id_agence" => $agence
                ])->fetchAll();
    } else {
        $listeCommandes = listeCommandes();
    }

 // - DELETE -
	if( isset($_GET['delete']) && ctype_digit($_GET['delete']) ){
		executionDeRequete("DELETE FROM commande 
                            WHERE id_commande = :artToDelete",
                        [
                            "artToDelete" => $_GET['delete']
                        ]);

        header("Location: commande.php");
        exit;
	}

    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }

	$template = "vues/vue_commande.php";

	include "layout.php";

?>