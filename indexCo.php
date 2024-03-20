<?php
session_start();
// Inclure le fichier du modèle
require_once ("PHP/modele.inc.php");

if (!isset($_SESSION['TYPE_UTILISATEUR'])) {
    require_once ("Views/view_connexion.php");
    

    // Vérifier si la soumission du formulaire de connexion
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'connexion') {
        // Vérifier si les champs username et password sont définis
        if (isset ($_POST['username']) && isset ($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Vérifier les informations d'identification
            try {
                $user = verifyUserlog($username, $password);

                if ($user) {
                    // Stocker les informations de l'utilisateur dans la session
                    $_SESSION['ID_EMPLOYE'] = $user[0]['ID_EMPLOYE'];
                    $_SESSION['EMAIL'] = $user[0]['EMAIL'];
                    $_SESSION['TYPE_UTILISATEUR'] = $user[0]['TYPE_UTILISATEUR'];
                    //var_dump($_SESSION);

                    // Redirection vers la page d'accueil

                    header("location:index.php?action=accueil");

                    exit();
                } else {
                    // Nom d'utilisateur ou mot de passe incorrect
                    $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect.";
                }
            } catch (ModeleException $e) {
                // Gérer les erreurs de modèle
                $_SESSION['error'] = "Erreur de modèle: " . $e->getMessage();
            }
        } else {
            $_SESSION['error'] = "Veuillez entrer un nom d'utilisateur et un mot de passe.";
        }

        // Redirection vers la page de connexion avec le message d'erreur

        header("location:indexCo.php");

        exit();
    }
    else{
        $_SESSION['error'] = "";
    }
}
else{
    header("location:index.php?action=accueil");
}

// Vérifier si l'utilisateur demande la déconnexion
if (isset ($_GET['action']) && $_GET['action'] == 'deconnexion') {
    // Détruire toutes les variables de session
    // $_SESSION = array();
    // Détruire la session
    unset($_SESSION['ID_EMPLOYE']);
    unset($_SESSION['EMAIL']);
    unset($_SESSION['TYPE_UTILISATEUR']);
    //var_dump($_SESSION);
    // Rediriger vers la page de connexion
    header("location:indexCo.php");
    exit();
}
