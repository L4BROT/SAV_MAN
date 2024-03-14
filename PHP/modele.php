<?php
    function getDetailCommandes($id){

        if(file_exists("../BDD/param.ini")){
            $tParam = parse_ini_file("../BDD/param.ini", true);
            extract($tParam["BDD"]);
        }

        define("OPTIONS", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $dsn = "mysql:host=$host;port=$port;dbname=$bdd";
        $connexion = new PDO($dsn, $user, $password, OPTIONS);

        $requete = "select * from commandes where ID_COMMANDE = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;
    }

    function getListCommandes(){
        if(file_exists("../BDD/param.ini")){
            $tParam = parse_ini_file("../BDD/param.ini", true);
            extract($tParam["BDD"]);
        }

        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        $dsn = "mysql:host=$host;port=$port;dbname=$bdd";
        $connexion = new PDO($dsn, $user, $password, $options);

        $requete = "select ID_COMMANDE as id, DATE_COMMANDE as date from commandes";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }

    function getNameUser($id){
        if(file_exists("../BDD/param.ini")){
            $tParam = parse_ini_file("../BDD/param.ini", true);
            extract($tParam["BDD"]);
        }

        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        $dsn = "mysql:host=$host;port=$port;dbname=$bdd";
        $connexion = new PDO($dsn, $user, $password, $options);

        $requete = "select NOM_CLIENT as nom, PRENOM_CLIENT as prenom from clients where ID_CLIENT = :id";
        $reponse = $connexion->prepare($requete);

        $reponse->bindValue(":id", htmlspecialchars($id), PDO::PARAM_STR);

        $reponse->execute();

        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        
        return $resultat;
    }
