<?php

	include "z_fonctions.php";

	$listeAgences = listeAgences();

// - CONNEXION - CONNEXION - CONNEXION -
	
	if( !empty($_POST['pseudo']) && !empty($_POST['mdp']) && isset($_POST['connex']) ){

			connexion($_POST['pseudo'], $_POST['mdp']);
/*
	        if($_SESSION['membre']['id_statut'] == "20"){
	        	connexion($_POST['pseudo'], $_POST['mdp']);
		        header("location:index.php");
		        exit;
		    }elseif($_SESSION['membre']['id_statut'] == "21"){
	        	connexion($_POST['pseudo'], $_POST['mdp']);
		        header("location:index.php");
		        exit;
		    }else{
            	$message = "Login ou mot de passe invalide";
        	}
*/
	}


// - INSCRIPTION - INSCRIPTION - INSCRIPTION -

	if(isset($_POST['inscript']) ){

		$query = executionDeRequete("SELECT id_membre FROM membre WHERE pseudo = :pseudoI", [ "pseudoI" => $_POST['pseudoI'] ]);
        $count = $query->rowCount();

        if($count == 1){
            // Pseudo déjà utilisé
            $pseudoPris = 'Ce pseudo est déjà utilisé';

        }else{

			inscription($_POST);

			header("Location: connexion.php");
    		exit;
    	}
	}



    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }




	$template = "vues/vue_connexion.php";

	include "layout.php";

?>