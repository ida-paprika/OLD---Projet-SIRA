<?php

	session_start();


    function executionDeRequete( $query, $params = array() ){
        $pdo = connect();

        $pdo->exec("SET NAMES UTF8");

        $res = $pdo->prepare($query);

        if( !empty($params) ){
            foreach ($params as $key => $value) {
                $params[$key] = htmlspecialchars($value);
            }
        }

        $res->execute($params);
        return $res;
    }

/* - CONNEXION / INSRIPTION / USERS - */

    function connect(){
        $pdo = new PDO("mysql:host=localhost;dbname=projet_sira;charset=utf8", "root", "",
        [
          PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
        ]);
        return $pdo;
    }


    function connexion($pseudo, $mdp){
        $pdo = connect();

        $query = "SELECT * FROM membre WHERE pseudo = :log";

        $requete = $pdo->prepare($query);
        $requete->execute(array("log" => htmlspecialchars($pseudo)));
        $mdp = $requete -> fetch();

        if($requete->rowCount() != 0){
            if(md5($_POST['mdp']) == $mdp['mdp']){
                $_SESSION['membre'] = $mdp;

                if($mdp['id_statut'] == "20"){
                    header("location:index.php");
                    exit;
                }elseif($mdp['id_statut'] == "21"){
                    header("location:index.php");
                    exit;
                }
            }
            
        }else{
            $message = "Mot de passe invalide";
        }
    }

 /* 
    function connexion($pseudo, $mdp){
        $pdo = connect();

        $query = "SELECT * FROM membre WHERE pseudo = :log";

        $requete = $pdo->prepare($query);
        $requete->execute(array("log" => htmlspecialchars($pseudo)));
        $mdp = $requete -> fetch();

        if($requete->rowCount() != 0 && md5($_POST['mdp']) == $mdp['mdp']){
            $_SESSION['membre'] = $mdp;

            if($mdp['id_statut'] == "20"){
                header("location:index.php");
                exit;
            }elseif($mdp['id_statut'] == "21"){
                header("location:index.php");
                exit;
            }
        }else{
            $message = "Mot de passe invalide";
        }
    }
*/

    function isConnected(){
        if(isset($_SESSION['membre'])){
            return true;
        }
        return false;
    }


    function deconnexion(){
            //session_destroy();
            unset($_SESSION['membre']);
            header("location:connexion.php");

    }


    function isAdmin(){
        if(isConnected() && $_SESSION['membre']['id_statut'] == "20"){
            return true;
        }
        return false;
    }


    function inscription($tab){

        extract($tab);

        $query = "INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, id_statut) 
                VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, 21)";
        
        executionDeRequete($query, 
            [
                "pseudo" => $pseudoI,
                "mdp" => md5($mdpI),
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "civilite" => $civilite
        ]);
    }


// - AFFICHAGE TABLEAUX - 
    function listeAgences(){

        $query = "SELECT * FROM agences";

        return executionDeRequete($query)->fetchAll();

    }


    function listeVehicules(){

        $query = "SELECT id_vehicule, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                FROM vehicule as v, agences as a
                WHERE v.id_agence = a.id_agence";

        return executionDeRequete($query)->fetchAll();

    }


    function listeMembres(){

        $query = "SELECT id_membre, pseudo, nom, prenom, email, civilite, statut, date_enregistrement 
                FROM membre as m, statut as s
                WHERE m.id_statut = s.id_statut";

        return executionDeRequete($query)->fetchAll();

    }


    function listeCommandes(){

        $query = "SELECT id_commande, c.id_membre as idMembre, nom, prenom, email, c.id_vehicule as idVehicule, v.titre as nomVehicule, c.id_agence as idAgence, a.titre as nomAgence, date_heure_depart, date_heure_fin, prix_total, c.date_enregistrement as c_date_enregistrement 
                FROM commande as c, membre as m, vehicule as v, agences as a 
                WHERE c.id_agence = a.id_agence 
                AND c.id_membre = m.id_membre 
                AND c.id_vehicule = v.id_vehicule";

        return executionDeRequete($query)->fetchAll();

    }


    function commandesMembre($membre){

        $query = "SELECT DISTINCT v.titre as nomVehicule, a.titre as nomAgence, date_heure_depart, date_heure_fin, prix_total
                FROM commande as c, membre as m, vehicule as v, agences as a 
                WHERE c.id_agence = a.id_agence 
                AND c.id_membre = :membre
                AND c.id_vehicule = v.id_vehicule";

        return executionDeRequete($query, [
                "membre" => $membre
            ])->fetchAll();
    }


// - FORMULAIRES AJOUT - 

    function ajoutAgence($tab, $nomPhoto){

        extract($tab);

        $query = "INSERT INTO agences 
                VALUES(null, :titre, :adresse, :ville, :cp, :descript, :photo)";
        
        $res = executionDeRequete($query, [
            "titre" => $titre,
            "adresse" => $adresse,
            "ville" => $ville,
            "cp" => $cp,
            "descript" => $descript,
            "photo" => $nomPhoto
        ]);
    }


    function ajoutVehicule($tab, $nomPhoto){

        extract($tab);

        $query = "INSERT INTO vehicule 
                VALUES(null, :agence, :titre, :marque, :modele, :descript, :photo, :prix)";
        
        executionDeRequete($query, [
            "agence" => $agence,
            "titre" => $titre,
            "marque" => $marque,
            "modele" => $modele,
            "descript" => $descript,
            "photo" => $nomPhoto,
            "prix" => $prix
        ]);
    }


    function ajoutCommande($membre, $vehicule, $agence, $dateDebut, $dateFin, $prixTotal){

        $query = "INSERT INTO commande 
                VALUES(null, :membre, :vehicule, :agence, :dateDebut, :dateFin, :prixTotal, NOW())";
        
        $res = executionDeRequete($query, [
            "membre" => $membre,
            "vehicule" => $vehicule,
            "agence" => $agence,
            "dateDebut" => $dateDebut,
            "dateFin" => $dateFin,
            "prixTotal" => $prixTotal
        ]);
    }


// - DELETE LIGNE BD -
    function delete(){
        executionDeRequete("DELETE FROM agences 
                            WHERE id_agence = :artToDelete",
                        [
                            "artToDelete" => $_GET['delete']
                        ]);

        header("Location: agence.php");
        exit;
        
    }


// - AFFICHER VEHICULE PAR AGENCE -
    function choixVehicule($agence){

        $query = "SELECT id_vehicule, a.titre as nomAgence, v.titre as titreVehicule, marque, modele, v.description as descriptVehicule, v.photo as photoVehicule, prix_journalier 
                FROM vehicule as v, agences as a
                WHERE v.id_agence = a.id_agence
                AND v.id_agence = :agence";

        $res = executionDeRequete($query, [
                "agence" => $agence
        ])->fetchAll();

        return $res;
    }


// - COMPTER LES LIGNES D'UNE TABLE -
    function countItem($table){
        $query = "SELECT COUNT(*) FROM $table";

        $res = executionDeRequete($query)->fetchAll();
        
        return $res[0][0];
    }    


    function newPhoto(){
        if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
            $infoFic = pathinfo($_FILES['photo']['name']);
            $extensions = ["jpg", "jpeg", "gif", "png"]; //extensions acceptées

            if($_FILES['photo']['size'] < 10000000 && 
                in_array($infoFic['extension'], $extensions)){ //limite la taille et l'extension acceptée pour un fichier
                    
                move_uploaded_file($_FILES['photo']['tmp_name'], './img/'.$_POST['ville'].".".$infoFic['extension']); //défini l'emplacement où est enregistré le fichier

                echo $_FILES['photo']['tmp_name'];
            }

        }
    }


?>