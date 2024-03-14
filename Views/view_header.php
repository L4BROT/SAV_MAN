<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="CSS/global.css" />
    <link rel="stylesheet" href="CSS/accueil.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.7/filtering/type-based/accent-neutralise.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <title><?php echo $titre ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color: #3b4f9f;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?action=accueil">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link mx-2" style="color: white;" aria-current="page" href="index.php?action=accueil">Accueil</a>
                <a class="nav-link mx-2" style="color: white;" href="index.php?action=sav">SAV</a>
                <a class="nav-link mx-2" style="color: white;" href="index.php?action=dossiers_finis">Dossiers finalisés</a>
                <a class="nav-link mx-2" style="color: white;" href="index.php?action=expedition">Expéditions</a>
            </div>
        </div>
    </div>
</nav>