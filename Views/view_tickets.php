<?php
if (isset ($tickets_spec)) {
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

if (isset ($tickets_expe)) {
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

if (isset ($allTickets)) {
    ?>
    <h2 class="titre_expe">Tous les tickets</h2>
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