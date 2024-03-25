<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/accueil.css">
    <link rel="stylesheet" href="CSS/tickets.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.7/filtering/type-based/accent-neutralise.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="JS/alert_deco.js"></script>
    <title><?php echo $titre ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color: #3b4f9f;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?action=accueil"><img src="IMG/Menuiz Man.png" alt="logo entreprise"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link mx-2" style="color: white;" aria-current="page" href="index.php?action=accueil">Accueil</a>
                <a class="nav-link mx-2" style="color: white;" href="index.php?action=sav">SAV</a>
                <a class="nav-link mx-2" style="color: white;" href="#">Dossiers finalisés</a>
                <a class="nav-link mx-2" style="color: white;" href="index.php?action=expedition">Expéditions</a>
                <a class="nav-link mx-2" style="color: white;" href="index.php?action=ticket">Tickets</a>
                <div class="dropdown">
                    <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-symbols-outlined">
                            shield_person
                        </span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="index.php?action=afficherUtilisateur">Afficher les utilisateurs</a></li>
                        <li><a class="dropdown-item"  href="index.php?action=creerUtilisateur">Créer un utilisateur</a></li>
                    </ul>
                </div>
                <a class="nav-link mx-2" style="color: red;" href="#" onclick="confirmLogout()">Déconnexion</a>
            </div>
        </div>
    </div>
</nav>

<!-- <br>
    <h1><?php // echo $titre ?></h1> 
<br> -->

<div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmLogoutModalLabel">Confirmation de déconnexion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir vous déconnecter?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="logout()">Déconnexion</button>
                    </div>
                </div>
            </div>
        </div>