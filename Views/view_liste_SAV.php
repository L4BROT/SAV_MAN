<!-- Afficher la liste du SAV -->
<?php       
    if(isset($retour_sav)){
?>
    <h2 id="titre_art">Touts les retours :</h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="col-2">Id retour</th>
                <th>Motif</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($retour_sav as $retour){
?>
            <tr>
                <td><?php echo $retour["id"];?></td>
                <td><?php echo $retour["motif"];?></td>
                <td>
                    <form action="index.php?action=sav" method="post">
                        <input type="hidden" name ="action" value="detail_SAV">
                        <input type="hidden" name="id_retour" value="<?php echo $retour["id"];?>">
                        <input type="submit" value="Voir" class="btn btn-primary">
                    </form>
                </td>
            </tr>
<?php
        }
?>
        </tbody>
        </table>
<?php
    }


// Afficher le detail
    if(isset($retour)){
?>
    <table id="detail_SAV" class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>Id du retour</th>
                <th>Quantite</th>
                <th>Motif du retour</th>
                <th>Id de l'article</th>
                <th>Id du ticket</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $retour["ID_RETOUR"]; ?></td>
                <td><?php echo $retour["QTE_RETOUR"]; ?></td>
                <td><?php echo $retour["MOTIF_RETOUR"]; ?></td>
                <td><?php echo $retour["ID_ARTICLE"]; ?></td>
                <td><?php echo $retour["ID_TICKET"]; ?></td>
            </tr>
        </tbody>
    </table>
<?php
    }
?>


<!-- Afficher la liste des rebus -->
<?php       
    if(isset($stock_rebus)){
?>
    <h2 id="titre_art">Touts les rebus :</h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="col-2">Id rebus</th>
                <th>Motif</th>
                <th>Quantite</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($stock_rebus as $rebus){
?>
            <tr>
                <td><?php echo $rebus["id"];?></td>
                <td><?php echo $rebus["motif"];?></td>
                <td><?php echo $rebus["qte"];?></td>
            </tr>
<?php
        }
?>
        </tbody>
        </table>
<?php
    } 