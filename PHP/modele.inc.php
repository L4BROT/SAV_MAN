<?php
require_once("ModelException.php");

function getConnexion(): PDO
{
    if (file_exists(__DIR__ . "/../BDD/param.ini")) {
        $tParam = parse_ini_file(__DIR__ . "/../BDD/param.ini", true);
        extract($tParam['BDD']);
    } else {
        throw new ModeleException("Fichier param.ini absent");
    }

    $dsn = "mysql:host=$host;port=$port;dbname=$bdd;charset=utf8";
    return new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function verifyUserlog($username, $password) {
    $connexion = getConnexion();

    $sql = "SELECT * FROM employes WHERE EMAIL = :username AND MDP_UTILISATEUR = :pass";
    $query = $connexion->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':pass', $password, PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    return $user;
}