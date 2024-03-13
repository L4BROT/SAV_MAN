<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>
        <?php echo $titre ?>
    </title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style="background-color: #3b4f9f;">
                    <div class="card-header text-center text-white">Login</div>
                    <div class="card-body ">
                        <form action="login_process.php" method="post">
                            <div class="form-group text-center text-white mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group text-center text-white">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group text-center mt-3">
                                <!-- Récupérer les clés valeurs du form pour gérer la connexion -->
                                <form action="" method="post">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "view_footer.php"; ?>