    <?php
    session_start(); // Démarrage de la session

    // Inclusion du fichier du modèle
    require_once("PHP/modele.inc.php");

    // Initialisation de la variable d'erreur
    $error = "";

    try {
        // Tentative de connexion à la base de données
        $connexion = getConnexion();
// echo "Connexion à la base de données réussie!";

    } catch (Exception $e) {
        // Affichage erreur de connexion
        $error = "Erreur lors de la connexion à la base de données: " . $e->getMessage();
//var_dump($error);
    }

    // Vérification de la soumission du formulaire de connexion
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'connexion') {

        // Vérification si les champs username et password sont définis
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Vérification des informations d'identification
            try {
                $user = verifyUserlog($username, $password);

                if ($user) {
                    // Supprimer la variable d'erreur de la session avant de rediriger vers la page de connexion
                    unset($_SESSION['error']);

                    // Stockage des informations de l'utilisateur dans la session
                    $_SESSION['ID_EMPLOYE'] = $user['ID_EMPLOYE'];
                    $_SESSION['EMAIL'] = $username;
                    $_SESSION['TYPE_UTILISATEUR'] = $user['TYPE_UTILISATEUR'];

//var_dump($_SESSION);
                    // Redirection vers la page d'accueil
                    header("Location: index.php?action=accueil");
                    exit();
                } else {
                    // Nom d'utilisateur ou mot de passe incorrect
                    $error = "Nom d'utilisateur ou mot de passe incorrect.";
                    //var_dump($error);
                }
            } catch (ModeleException $e) {
                // Gestion des erreurs de modèle
                $error = "Erreur de modèle: " . $e->getMessage();
//var_dump($error);
            }
        } else {

            $error = "Veuillez entrer un nom d'utilisateur et un mot de passe.";
//var_dump($error);
        }

        // Stockage de l'erreur dans la session
        $_SESSION['error'] = $error;

        // Redirection vers la page de connexion avec le message d'erreur
        header("Location: Views/view_connexion.php");
        exit();
    }

    if (isset($_GET['action']) && $_GET['action'] === 'deconnexion') {
        // Détruire toutes les variables de session
        $_SESSION = array();

        // Détruire la session
        session_destroy();

        // Rediriger vers la page de connexion
        header("Location: Views/view_connexion.php");
        exit();
    }
    ?>