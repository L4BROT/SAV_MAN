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

    // Donne le nom et le prénom d'un client avec son ID
    function getNameUser($id){
        $connexion = getBdd();
        $requete = "select NOM_CLIENT as nom, PRENOM_CLIENT as prenom from clients where ID_CLIENT = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;
    }
    
    // Donne tous les articles rattachés à une commande avec l'ID commande
    function getArticlesCommande($id){
        $connexion = getBdd();
        $requete = "select LIBELLE_ART, PRIX_ART, COULEUR_ART, article.ID_ARTICLE, GARANTIE_ART from ligne_commande
                    inner join article on ligne_commande.ID_ARTICLE = article.ID_ARTICLE
                    where ligne_commande.ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    // Donne toutes les informations de toutes les commandes
    function getListArticles(){
        $connexion = getBdd();
        $requete = "select LIBELLE_ART as nom, PRIX_ART as prix, COULEUR_ART as couleur, GARANTIE_ART as garantie, QTE_STOCK as stock, QTE_SAV as sav, QTE_REBUS as rebus from article";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    // Donne toutes les commandes avec des expéditions en attente
    function getExpeAttente(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut from commandes where STATUT_EXPEDITION = 'En attente'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    // Donne toutes les commandes avec des expéditions en cours
    function getExpeEnCours(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut from commandes where STATUT_EXPEDITION = 'En cours'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    // Donne toutes les expéditions sans filtre
    function getAllExpe(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut from commandes";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    // Donne toutes les expéditions terminées
    function getExpeFinis(){
        $connexion = getBdd();
        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date, STATUT_EXPEDITION as statut, PRIX_COMMANDE as prix from commandes where STATUT_EXPEDITION = 'Livrée'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    // Donne les informations d'une seule commande au statut "en attente" de livraison, depuis son ID
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

    // Valide une expédition, modifie le statut d'une commande "En attente" à "En cours", depuis son ID
    function valider_expe($id){
        $connexion = getBdd();
        $requete = "update commandes set STATUT_EXPEDITION = 'En cours' where ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();
    }

    // Crée un ticket expédition après la validation d'une expédition
    function ticketExpe($id, $employe){
        $connexion = getBdd();
        $requete = "insert into tickets (`DATE_TICKET`, `MOTIF_TICKET`, `ID_EMPLOYE`, `ID_COMMANDE`)
                    values (DATE(NOW()), 'Expédition', :employe, :id)";

        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);
        $reponse->bindValue(":employe", htmlspecialchars($employe), PDO::PARAM_STR);

        $reponse->execute();
    }

    // Donne la date d'expédition d'une commande depuis son ID
    function getDateExpe($id){
        $connexion = getBdd();
        $requete = "select DATE_TICKET as date from tickets where ID_COMMANDE = :id and MOTIF_TICKET = 'Expédition'";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultats = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    // Sort tous les tickets relatifs à une commande depuis l'ID de la commande
    function getTicketsSpec($id){
        $connexion = getBdd();
        $requete = "select * from tickets where ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    // Donne tous les tickets d'expédition
    function getTicketsExpe(){
        $connexion = getBdd();
        $requete = "select * from tickets where MOTIF_TICKET = 'Expédition'";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    // Donne tous les tickets confondus
    function getAllTickets(){
        $connexion = getBdd();
        $requete = "select * from tickets";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    // Donne le nom et le prénom d'un employé depuis son ID
    function getNameEmploye($id){
        $connexion = getBdd();
        $requete = "select * from employes where ID_EMPLOYE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    // Donne l'ID de l'employé qui a envoyé une commande, depuis un ID commande
    function idEmployeFromCom($id){
        $connexion = getBdd();
        $requete = "select ID_EMPLOYE from tickets where ID_COMMANDE = :id and MOTIF_TICKET = 'Expédition'";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    function creaTicket($id, $employe, $motif){
        $connexion = getBdd();
        $requete = "insert into tickets (`DATE_TICKET`, `MOTIF_TICKET`, `ID_EMPLOYE`, `ID_COMMANDE`)
                    values (DATE(NOW()), :motif, :employe, :id)";

        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);
        $reponse->bindValue(":employe", htmlspecialchars($employe), PDO::PARAM_STR);
        $reponse->bindValue(":motif", htmlspecialchars($motif), PDO::PARAM_STR);

        $reponse->execute();
    }

    function articleNameFromID($id){
        $connexion = getBdd();
        $requete = "select LIBELLE_ART from article where ID_ARTICLE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultats = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultats["LIBELLE_ART"];
    }

    function creaTicket2($id, $employe, $motif, $article){
        $connexion = getBdd();
        $requete = "insert into tickets (`DATE_TICKET`, `MOTIF_TICKET`, `ID_EMPLOYE`, `ID_COMMANDE`, `ID_ARTICLE`)
                    values (DATE(NOW()), :motif, :employe, :id, :article)";

        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);
        $reponse->bindValue(":employe", htmlspecialchars($employe), PDO::PARAM_STR);
        $reponse->bindValue(":motif", htmlspecialchars($motif), PDO::PARAM_STR);
        $reponse->bindValue(":article", htmlspecialchars($article), PDO::PARAM_STR);

        $reponse->execute();
    }

    function getListSAV(){
        $connexion = getBdd();

        $requete = "select * from article where QTE_SAV > 0";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    }

    function getListRebus(){
        $connexion = getBdd();

        $requete = "select * from article where QTE_REBUS > 0";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
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
    function addEmploye($mdp,$typ,$nom,$prenom,$mail) {
        //Appel la fonction de controle de saisie des champs
        $cond = controleChamp($mdp,$nom,$prenom);
        if ($cond == "mdpErrone") {
            return "mdpErrone";
        }elseif ($cond == "nomErrone") {
            return "nomErrone";
        }elseif ($cond == "prenomErrone") {
            return "prenomErrone";
        }
        //Recupere un tableau d'utilisateur
        $tabEmployes = afficheUtilisateur();
        //Parcour le tableaux et verifie si le mot de passe est disponible
        foreach ($tabEmployes as $row) {
            if ($row['EMAIL'] == $mail) {
                $delet = "mailidentique";
                return $delet;
            }else {
                $delet=true;
            }
            
        }
        if ($delet == true && $cond == "ok") {
            $based = getBdd();
            //var_dump($based);
            $delete = $based->prepare('INSERT INTO employes (NOM_UTILISATEUR, PRENOM_UTILISATEUR,MDP_UTILISATEUR, TYPE_UTILISATEUR,EMAIL) VALUES (:nom,:prenom,:mdp,:typ,:mail)');          
            //var_dump($delete);
        
            $delete->bindParam('mdp', $mdp, PDO::PARAM_STR);
            $delete->bindParam('prenom', $prenom, PDO::PARAM_STR);
            $delete->bindParam('typ', $typ, PDO::PARAM_STR);
            $delete->bindParam('nom', $nom, PDO::PARAM_STR);
            $delete->bindParam('mail', $mail, PDO::PARAM_STR);
            
            
            $delet = $delete->execute();
            //var_dump($delet);
            
            return "formok";
        }
       
    }

        
   

    function controleChamp($mdp,$nom,$prenom){
        if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/', $mdp)) {
            $ok = "ok";
        }else return "mdpErrone";
        if (preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $nom)) {
            $ok = "ok";
        }else return "nomErrone";
        if ( preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $prenom)) {
            $ok = "ok";
        }else return "prenomErrone";
        
        return $ok;
    }

    //Affiche les utilisateur present dans la bdd
    function afficheUtilisateur(){
        $bdd = getBdd();
        $utilisateur = $bdd->query('SELECT * from employes' );
        
        return $utilisateur->fetchAll(PDO::FETCH_ASSOC);
    }
 
    //Permet de modifier les utilisateurs
    function modifierUtilisateur($nom,$id,$typ,$prenom,$mail){
        $liste = afficheUtilisateur();
        $compt = 0 ;
        
        foreach ($liste as $row) {
            if ($row['EMAIL'] == $mail && $row['ID_EMPLOYE'] != $id) {
                return "mailidentique";
            }
            if ($row['TYPE_UTILISATEUR'] == 'Admin') {
                $compt++;
            }
            if ($row['ID_EMPLOYE'] == $id) {
                $type = $row['TYPE_UTILISATEUR'];
            }
        }
        //Valide les saisie de modification renvoie vrais ou faux
        if ($type == 'Admin' && $typ != 'Admin' && $compt == 1) {
            return "resteAdmin";
        }else {
            if (preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $nom)) {
                $ok = "ok";
            }else return "nomErrone";
            if ( preg_match('/^(?:[^\d\W][\-\s\']{0,1}){2,20}$/i', $prenom)) {
                $ok = "ok";
            }else return "prenomErrone";
            if ($ok = "ok")  {
                //Si vrais envoie de la requete et modification dans la bdd
                $based = getBdd();
        
                $mod = $based->prepare('UPDATE employes SET NOM_UTILISATEUR= :nvNom, PRENOM_UTILISATEUR= :nvprenom, TYPE_UTILISATEUR= :nvType, EMAIL= :nvMail WHERE ID_EMPLOYE= :contactId');          
                
                $mod->bindParam(':nvType', $typ, PDO::PARAM_STR);
                $mod->bindParam(':nvNom', $nom, PDO::PARAM_STR);
                $mod->bindParam(':nvprenom', $prenom, PDO::PARAM_STR);
                $mod->bindParam(':contactId', $id, PDO::PARAM_INT);
                $mod->bindParam(':nvMail', $mail, PDO::PARAM_STR);
                
                $delet = $mod->execute();
                return "formok";
                
            }
        }
        
    }
    
    function recupTicket(){
        $bdd = getBdd();
        $listeTicket = $bdd->query('SELECT * from tickets' );
        return $listeTicket->fetchAll(PDO::FETCH_ASSOC);
    }

    //Permet de supprimer un utilisateur
    function supprimeEmploye($id,$typ){

        $val = false;
        $liste = afficheUtilisateur();
        $compt = 0 ;
        $bdd = getBdd();
        $listeTicket = recupTicket();

        foreach ($liste as $row) {
            if ($row['TYPE_UTILISATEUR'] == 'Admin') {
                $compt++;
            }
            if ($row['ID_EMPLOYE'] == $id) {
                $type = $row['TYPE_UTILISATEUR'];
            }
        }

        foreach ($listeTicket as $row) {
            if ($row['ID_EMPLOYE'] == $id) {
                $val = true;
                break;
            }
        }

        if ($val) {
            return "ticketenCours";
        }elseif ($compt == 1 && $type == 'Admin') {
            return 'adminSeul';
        }else {
            //Connexion a la bdd et envoie de la requete et suppression de l'employe dans la bdd
            $based = getBdd();
            
            $mod = $based->prepare('DELETE FROM employes WHERE ID_EMPLOYE= :contactId');          
        
            $mod->bindParam(':contactId', $id, PDO::PARAM_INT);
            try {
                $delet = $mod->execute();
                return "formok";
            } catch (PDOException $th) {
                $delet = false;
            }
        }
        
    }

    function modifierMotDePasse($id,$mdp,$confirmMdp){
        if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/', $mdp) && preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/', $confirmMdp)){
            if ($mdp != $confirmMdp) {
                $delet = false;
            }else {
                $based = getBdd();
                $mod = $based->prepare('UPDATE employes SET MDP_UTILISATEUR= :nvMdp WHERE ID_EMPLOYE= :id');
                $mod->bindParam('nvMdp', $mdp, PDO::PARAM_STR);
                $mod->bindParam('id', $id, PDO::PARAM_INT);
                $delet = $mod->execute();
                return $delet;
            }
        }
    }
     