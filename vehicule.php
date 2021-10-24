<?php

	include "z_fonctions.php";

	$listeAgences = listeAgences();

// - TRIER PAR AGENCE -
    if(isset($_POST['triAgence'])){

        $agence = $_POST['agence'];

        $listeVehicules = executionDeRequete("SELECT id_vehicule, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                FROM vehicule as v, agences as a
                WHERE v.id_agence = :id_agence
                AND v.id_agence = a.id_agence", [
                    "id_agence" => $agence
                ])->fetchAll();
    } else {
        $listeVehicules = listeVehicules();
    }

// - AJOUTER VEHICULE -
    if(isset($_POST['ajout']) && !empty($_POST['titre'])){
        var_dump($_POST);
        if(isset($_FILES['photo']['name'])){
            $infoFic = pathinfo($_FILES['photo']['name']);
            $extensions = ["jpg", "jpeg", "gif", "png"];

            if($_FILES['photo']['size'] < 100000000 &&
                in_array($infoFic['extension'], $extensions)){

                $nom_photo = $_POST['titre'].".".$infoFic['extension'];

                move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$nom_photo);
            }
        }

        ajoutVehicule($_POST, $nom_photo);

        header("Location: vehicule.php");
        exit;
    }

// - REMPLIR LES CHAMPS POUR EDITER -
	if(isset($_GET['editVehicule']) && ctype_digit($_GET['editVehicule'])){

		$query = "SELECT *
					FROM vehicule
					WHERE id_vehicule = :idVehicule";

		$res = executionDeRequete($query, array(
            "idVehicule" => $_GET['editVehicule']
        ));

        $vehiculeModif = $res -> fetch();
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

    	executionDeRequete("UPDATE vehicule 
                 	SET titre = :newTitre, marque = :newMarque, modele = :newModele, description = :newDescript, photo = :newPhoto, prix_journalier = :newPrix
                    WHERE id_vehicule = :idV", 
                [
                  "newTitre" => $_POST['titre'],
                  "newMarque" => $_POST['marque'],
                  "newModele" => $_POST['modele'],
                  "newDescript" => $_POST['descript'],
                  "newPhoto" => $nom_photo,
                  "newPrix" => $_POST['prix'],
                  "idV" => $_GET['editVehicule']
                ]);

    	header("Location: vehicule.php");
    	exit;
	}


 // - DELETE -
	if( isset($_GET['delete']) && ctype_digit($_GET['delete']) ){
		executionDeRequete("DELETE FROM vehicule 
                            WHERE id_vehicule = :artToDelete",
                        [
                            "artToDelete" => $_GET['delete']
                        ]);

        header("Location: vehicule.php");
        exit;
	}


// - DECONNEXION -
    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	   deconnexion();
    }


	$template = "vues/vue_vehicule.php";

    include "layout.php";

?>