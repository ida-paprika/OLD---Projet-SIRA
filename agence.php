<?php

	include "z_fonctions.php";

	$listeAgences = listeAgences();
	
    
// - AJOUTER AGENCE -
    if(isset($_POST['ajout']) && !empty($_POST['titre'])){

		if(isset($_FILES['photo']['name'])){
            $infoFic = pathinfo($_FILES['photo']['name']);
            $extensions = ["jpg", "jpeg", "gif", "png"];

            if($_FILES['photo']['size'] < 100000000 && 
                in_array($infoFic['extension'], $extensions)){

                $nom_photo = $_POST['titre'].".".$infoFic['extension'];

                move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$nom_photo);
            }
        }

		ajoutAgence($_POST, $nom_photo);

		header("Location: agence.php");
		exit;
	}

// - REMPLIR LES CHAMPS POUR EDITER -
	if(isset($_GET['editAgence']) && ctype_digit($_GET['editAgence'])){

		$query = "SELECT *
					FROM agences
					WHERE id_agence = :idAgence";

		$res = executionDeRequete($query, array(
            "idAgence" => $_GET['editAgence']
        ));

        $agenceModif = $res -> fetch();
	}




// - METTRE A JOUR DANS LA BD -
    $nom_photo = "";

	if( isset($_POST['edit']) && !empty($_POST['titre']) ){

        if(isset($_POST['nomPhoto'])){
            $nom_photo = $_POST['nomPhoto'];
        }

		if(isset($_FILES['photo']['name'])){
            $infoFic = pathinfo($_FILES['photo']['name']);
            $extensions = ["jpg", "jpeg", "gif", "png"];

            if($_FILES['photo']['size'] < 100000000 && 
                in_array($infoFic['extension'], $extensions)){

                $nom_photo = $_POST['titre'].".".$infoFic['extension'];

                move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$nom_photo);
            }
        }

    	executionDeRequete("UPDATE agences 
                 	SET titre = :newTitre, adresse = :newAdresse, ville = :newVille, cp = :newCP, description = :newDescript, photo = :newPhoto
                    WHERE id_agence = :idA", 
                [
                  "newTitre"    => $_POST['titre'],
                  "newAdresse"  => $_POST['adresse'],
                  "newVille"  => $_POST['ville'],
                  "newCP"  => $_POST['cp'],
                  "newDescript"  => $_POST['descript'],
                  "newPhoto"  => $nom_photo,
                  "idA"         => $_GET['editAgence']
                ]);

    	header("Location: agence.php");
    	exit;
	}

 // - DELETE -
	if( isset($_GET['delete']) && ctype_digit($_GET['delete']) ){
		executionDeRequete("DELETE FROM agences 
                            WHERE id_agence = :artToDelete",
                        [
                            "artToDelete" => $_GET['delete']
                        ]);

        header("Location: agence.php");
        exit;
	}

 

    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
       deconnexion();
    }



	$template = "vues/vue_agence.php";

    include "layout.php";

?>