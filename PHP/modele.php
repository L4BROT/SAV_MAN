<?php
    function getListCommandes(){

        if(file_exists("../BDD/param.ini")){
            $tParam = parse_ini_file("../BDD/param.ini", true);
            extract($tParam["BDD"]);
        }

        define("OPTIONS", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $dsn = "mysql:host=$host;port=$port;dbname=$bdd";
        $connexion = new PDO($dsn, $user, $password, OPTIONS);

        $requete = "select * from commandes";
        $reponse = $connexion->prepare($requete);

        $reponse->execute();

        $resultats = $reponse->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultats;
    }
