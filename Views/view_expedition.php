<?php       
    if(isset($expe_attente)){
?>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Date commande</th>
                <th>Statut expédition</th>
                <th>Expédier</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($expe_attente as $expe){
?>
            <tr>
                <td><?php echo $expe["id"];?></td>
                <td><?php echo date('d/m/Y', strtotime($expe["date"]));?></td>
                <td><?php echo $expe["statut"];?></td>
                <td>
                    <form action="index.php?action=expedition" method="post">
                        <input type="hidden" name ="action" value="expedier">
                        <input type="hidden" name="id_commande" value="<?php echo $expe["id"];?>">
                        <input type="submit" value="Expédier" class="btn btn-primary">
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

    if(isset($expe_en_cours)){
?>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Date expédition</th>
                <th>Statut expédition</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($expe_en_cours as $expe){
?>
            <tr>
                <td><?php echo $expe["id"];?></td>
                <td><?php echo "Voir avec ticket";?></td>
                <td><?php echo $expe["statut"];?></td>
            </tr>
<?php
        }
?>
        </tbody>
        </table>
<?php
    }

    if(isset($expedier)){
?>
        <table id="detail_commande" class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date commande</th>
                    <th>Paiement</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Code postal</th>
                    <th>Envoyer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo date('d/m/Y', strtotime($expedier["date"])); ?></td>
                    <td><?php echo $expedier["paiement"]; ?></td>
                    <td><?php echo $expedier["adresse"]; ?></td>
                    <td><?php echo $expedier["ville"]; ?></td>
                    <td><?php echo $expedier["cp"]; ?></td>
                    <td>
                    <form action="index.php?action=expedition" method="post">
                        <input type="hidden" name ="action" value="valider_expe">
                        <input type="hidden" name="id_commande" value="<?php echo $expedier["id"];?>">
                        <input type="submit" value="Valider" class="btn btn-primary">
                    </form>
                    </td>
                </tr>
            </tbody>
        </table>
<?php
    }