<?php

	include "z_fonctions.php";
		
	$listeAgences = listeAgences();
	
	$listeMembres = listeMembres();


 // - DELETE -
	if( isset($_GET['delete']) && ctype_digit($_GET['delete']) ){
		executionDeRequete("DELETE FROM membre 
                            WHERE id_membre = :artToDelete",
                        [
                            "artToDelete" => $_GET['delete']
                        ]);

        header("Location: membre.php");
        exit;
	}


    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }


	$template = "vues/vue_membre.php";

	include "layout.php";

?>