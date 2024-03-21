<?php
if (isset($tickets_spec)) {
    if ($tickets_spec == false) {
        ?>
        <h3 id="titre_centre">Il n'y a pas de tickets pour la commande n°
            <?php echo $id; ?>
        </h3>
        <button type="reset" id="btn_retour_centre" class="btn btn-danger"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"
                style="text-decoration:none;color: #FFFFFF">Retour</a></button>
        <?php
    } else {
        ?>
        <h2 class="titre_expe">Tickets commande n°
            <?php echo $id; ?> :
        </h2>
        <table id="detail_commande" class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date ticket</th>
                    <th>Motif</th>
                    <th>Employé</th>
                    <th>Commande</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tickets_spec as $ticket) {
                    $employe = getNameEmploye($ticket["ID_EMPLOYE"]);
                    ?>
                    <tr>
                        <td>
                            <?php echo date('d/m/Y', strtotime($ticket["DATE_TICKET"])); ?>
                        </td>
                        <td>
                            <?php echo $ticket["MOTIF_TICKET"]; ?>
                        </td>
                        <td>
                            <?php echo $employe["NOM_UTILISATEUR"] . " " . $employe["PRENOM_UTILISATEUR"]; ?>
                        </td>
                        <td>
                            <?php echo $ticket["ID_COMMANDE"]; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <button type="reset" id="btn_retour" class="btn btn-danger"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"
                style="text-decoration:none;color: #FFFFFF">Retour</a></button>
        <?php
    }
}

if (isset($tickets_expe)) {
    ?>
    <h2 class="titre_expe">Tickets expéditions</h2>
    <table id="myTable" class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>Date ticket</th>
                <th>Motif</th>
                <th>Employé</th>
                <th>Commande</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tickets_expe as $ticket) {
                $employe = getNameEmploye($ticket["ID_EMPLOYE"]);
                ?>
                <tr>
                    <td>
                        <?php echo date('d/m/Y', strtotime($ticket["DATE_TICKET"])); ?>
                    </td>
                    <td>
                        <?php echo $ticket["MOTIF_TICKET"]; ?>
                    </td>
                    <td>
                        <?php echo $employe["NOM_UTILISATEUR"] . " " . $employe["PRENOM_UTILISATEUR"]; ?>
                    </td>
                    <td>
                        <?php echo $ticket["ID_COMMANDE"]; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <button type="reset" id="btn_retour" class="btn btn-danger"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"
            style="text-decoration:none;color: #FFFFFF">Retour</a></button>
    <?php
}

if (isset($allTickets)) {
    ?>
    <h2 class="titre_expe">Tous les tickets</h2>
    <table id="myTable" class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>Date ticket</th>
                <th>Motif</th>
                <th>Employé</th>
                <th>Commande</th>
                <th>Article</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($allTickets as $ticket) {
                $employe = getNameEmploye($ticket["ID_EMPLOYE"]);
                ?>
                <tr>
                    <td>
                        <?php echo date('d/m/Y', strtotime($ticket["DATE_TICKET"])); ?>
                    </td>
                    <td>
                        <?php echo $ticket["MOTIF_TICKET"]; ?>
                    </td>
                    <td>
                        <?php echo $employe["NOM_UTILISATEUR"] . " " . $employe["PRENOM_UTILISATEUR"]; ?>
                    </td>
                    <td>
                        <?php echo $ticket["ID_COMMANDE"]; ?>
                    </td>
                    <td>
                        <?php
                            if($ticket["ID_ARTICLE"] != NULL){
                                echo articleNameFromID($ticket["ID_ARTICLE"]);
                            } 
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <button type="reset" id="btn_retour" class="btn btn-danger"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"
            style="text-decoration:none;color: #FFFFFF">Retour</a></button>
    <?php
}

if (isset($creaTicket)) {
    ?>
    <!-- Affichage du formulaire de création de ticket -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Créer un nouveau ticket</h2>
                        <p>Commande n°<?php echo $_SESSION["id_commande"]; ?></p>
                        <p>Employé : 
                            <?php 
                                $nom = getNameEmploye($_SESSION["id_employe"]);
                                echo $nom["NOM_UTILISATEUR"] . " " . $nom["PRENOM_UTILISATEUR"];
                            ?>
                        </p>

                        <?php
                            if(isset($_POST["id_article"])){
                                echo "Article : " . articleNameFromID($_POST["id_article"]) . "<br><br>";
                                $_SESSION["id_article"] = $_POST["id_article"];
                            }
                        ?>

                        <form action="index.php?action=ticket" method="post">
                            <div class="form-group">
                                <label for="motif_ticket">Motif du ticket :</label>
                                <input type="text" class="form-control" id="motif_ticket" name="motif_ticket" required>
                            </div>
                            <?php 
                                if(isset($_POST["id_article"])){
                                    echo '<input type="hidden" name="action" value="validerCrea2" />';
                                }
                                else{
                                    echo '<input type="hidden" name="action" value="validerCrea" />';
                                }
                            ?>
                            <button type="submit" class="btn btn-primary btn-block mt-2">Créer le ticket</button>
                            <button type="reset" class="btn btn-danger btn-block mt-2"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="text-decoration:none;color: #FFFFFF">Retour</a></button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php
}

if (isset($creaOK)) {
?>
    <h2 id="titre_centre">Ticket bien crée</h2>
<?php
}
?>