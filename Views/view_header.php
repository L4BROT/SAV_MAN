<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?php echo $titre ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color: #3b4f9f;">
    <div class="container-fluid">
        <a class="navbar-brand" href="view_accueil.php">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link mx-2" style="color: white;" aria-current="page" href="view_accueil.php">Accueil</a>
                <a class="nav-link mx-2" style="color: white;" href="#">SAV</a>
                <a class="nav-link mx-2" style="color: white;" href="#">Dossiers finalisés</a>
                <a class="nav-link mx-2" style="color: white;" href="#">Expéditions</a>
            </div>
        </div>
    </div>
</nav>