<?php
    // Donne toutes les informations d'une seule commande en recherche par ID
    function getDetailCommandes($id){
        $connexion = getBdd();
        $requete = "select * from commandes where ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION["id_commande"] = $id;

        return $resultat;
    }

    // Donne les informations de toutes les commandes
    function getListCommandes(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, ID_CLIENT as client from commandes";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function getNameUser($id){
        $connexion = getBdd();
        $requete = "select NOM_CLIENT as nom, PRENOM_CLIENT as prenom from clients where ID_CLIENT = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;
    }
    
    function getArticlesCommande($id){
        $connexion = getBdd();
        $requete = "select LIBELLE_ART, PRIX_ART, COULEUR_ART, GARANTIE_ART from ligne_commande
                    inner join article on ligne_commande.ID_ARTICLE = article.ID_ARTICLE
                    where ligne_commande.ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    function getListArticles(){
        $connexion = getBdd();
        $requete = "select LIBELLE_ART as nom, PRIX_ART as prix, COULEUR_ART as couleur, GARANTIE_ART as garantie, QTE_STOCK as stock, QTE_SAV as sav, QTE_REBUS as rebus from article";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function getExpeAttente(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut from commandes where STATUT_EXPEDITION = 'En attente'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function getExpeEnCours(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut from commandes where STATUT_EXPEDITION = 'En cours'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function getAllExpe(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut from commandes";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function getExpeFinis(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut, PRIX_COMMANDE as prix from commandes where STATUT_EXPEDITION = 'Livrée'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function showBeforeExpe($id){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_PAIEMENT as paiement, ADRESSE_CLIENT as adresse, VILLE_CLIENT as ville,
                    CP_CLIENT as cp from commandes
                    inner join clients on clients.ID_CLIENT = commandes.ID_CLIENT
                    where ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultats = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function valider_expe($id){
        $connexion = getBdd();
        $requete = "update commandes set STATUT_EXPEDITION = 'En cours' where ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();
    }

    function ticketExpe($id, $employe){
        $connexion = getBdd();
        $requete = "insert into tickets (`DATE_TICKET`, `MOTIF_TICKET`, `ID_EMPLOYE`, `ID_COMMANDE`)
                    values (DATE(NOW()), 'Expédition', :employe, :id)";

        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);
        $reponse->bindValue(":employe", htmlspecialchars($employe), PDO::PARAM_STR);

        $reponse->execute();
    }

    function getDateExpe($id){
        $connexion = getBdd();
        $requete = "select DATE_TICKET as date from tickets where ID_COMMANDE = :id and MOTIF_TICKET = 'Expédition'";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultats = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function getTicketsSpec($id){
        $connexion = getBdd();
        $requete = "select * from tickets where ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    function getTicketsExpe(){
        $connexion = getBdd();
        $requete = "select * from tickets where MOTIF_TICKET = 'Expédition'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    function getAllTickets(){
        $connexion = getBdd();
        $requete = "select * from tickets";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    function getNameEmploye($id){
        $connexion = getBdd();
        $requete = "select * from employes where ID_EMPLOYE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    //Creation de l'objet pdo connexion a la bdd
    function getBdd() {
        //Recuperation des parametre de connexion
        if (file_exists("BDD/param.ini")) {
            $param = parse_ini_file("BDD/param.ini",true);
            extract($param['BDD']);
        }
        $bdd = "mysql:host=$host;port=$port;dbname=$bdd;charset=utf8";
        //var_dump($bdd);
        $connexion = new PDO($bdd,$user ,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //print_r($connexion);
        return $connexion;
    }
 
    // Ajouter un employé 
    function addEmploye($mdp,$typ,$nom,$prenom) {
        //Appel la fonction de controle de saisie des champs
        $cond = controleChamp($mdp,$nom,$prenom);
        //Recupere un tableau d'utilisateur
        $tabEmployes = afficheUtilisateur();
        //Parcour le tableaux et verifie si le mot de passe est disponible
        foreach ($tabEmployes as $row) {
            if ($row['MDP_UTILISATEUR'] == $mdp) {
                $cond = false ;
                break;
            }else {
                $cond;
            }
        }
        //Si vrais execution de la requete d'ajout de l'utilisateur a la bdd
        if ($cond) {
            //echo($mdp.$typ.$nom);
            $based = getBdd();
            //var_dump($based);
            $delete = $based->prepare('INSERT INTO employes (NOM_UTILISATEUR, PRENOM_UTILISATEUR,MDP_UTILISATEUR, TYPE_UTILISATEUR ) VALUES (:nom,:prenom,:mdp,:typ)');          
            //var_dump($delete);
        
            $delete->bindParam('mdp', $mdp, PDO::PARAM_STR);
            $delete->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $delete->bindParam('typ', $typ, PDO::PARAM_STR);
            $delete->bindParam('nom', $nom, PDO::PARAM_STR);
            
            
            $delet = $delete->execute();
            //var_dump($delet);
            
            return $delet;
            
        }else {//Sinon retourne faux pour afficher un message d'erreur
            $delet = false;
            return $delet;
        }
        
    }

    function controleChamp($mdp,$nom,$prenom){
        if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/', $mdp) && preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $nom)&&preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $prenom)) {
            return true;
        }else {
            return false;
        }
    
    }

    //Affiche les utilisateur present dans la bdd
    function afficheUtilisateur(){
        $bdd = getBdd();
        $utilisateur = $bdd->query('SELECT * from employes' );
        
        return $utilisateur->fetchAll(PDO::FETCH_ASSOC);
    }
 
    //Permet de modifier les utilisateurs
    function modifierUtilisateur($nom,$id,$typ,$prenom){
        //Valide les saisie de modification renvoie vrais ou faux
        if (preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $nom)&&preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $prenom))  {
            //Si vrais envoie de la requete et modification dans la bdd
            $based = getBdd();
    
            $mod = $based->prepare('UPDATE employes SET NOM_UTILISATEUR= :nvNom, PRENOM_UTILISATEUR= :nvprenom, TYPE_UTILISATEUR= :nvType  WHERE ID_EMPLOYE= :contactId');          
            
            $mod->bindParam(':nvType', $typ, PDO::PARAM_STR);
            $mod->bindParam(':nvNom', $nom, PDO::PARAM_STR);
            $mod->bindParam(':nvprenom', $prenom, PDO::PARAM_STR);
            $mod->bindParam(':contactId', $id, PDO::PARAM_INT);
            
            $delet = $mod->execute();
            return $delet;
            
        }else {//Sinon renvoie faux pour afficher un message d'erreur
            $delet = false;
            return $delet;
        }
    }
  //Permet de supprimer un utilisateur
    function supprimeEmploye($id){
        //Connexion a la bdd et envoie de la requete et suppression de l'employe dans la bdd
        $based = getBdd();
        
        $mod = $based->prepare('DELETE FROM employes WHERE ID_EMPLOYE= :contactId');          
    
        $mod->bindParam(':contactId', $id, PDO::PARAM_INT);
        try {
            $delet = $mod->execute();
        } catch (PDOException $th) {
            $delet = false;
        }
        
        return $delet;
    }
     