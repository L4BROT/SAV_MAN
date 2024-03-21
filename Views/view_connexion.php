<?php

// Initialisation de la variable d'erreur
$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style="background-color: #3b4f9f;">
                    <div class="card-header text-center text-white">Login</div>
                    <div class="card-body ">
                        <form action="indexCo.php" method="post">
                            <input type="hidden" name="action" value="connexion">
                            <div class="form-group text-center text-white mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group text-center text-white">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group text-center mt-3">
                                <!-- Bouton de soumission à l'intérieur du formulaire principal -->
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <?php
                            // Vérifie si la variable d'erreur est définie et non vide
                            if (!empty($error)) {
                                echo "<div class='error-message text-center mt-3 alert alert-danger' style='padding: 5px;'>
                                          <p style='font-weight: bold; color: red;'>$error</p>
                                      </div>";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "view_footer.php"; ?>