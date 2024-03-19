<?php 
if(isset($tickets_spec)){
?>
    <h2 class="titre_expe">Tickets commande n° <?php echo $tickets_spec["ID_COMMANDE"]; ?> :</h2>
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
            <tr>
                <td><?php echo date('d/m/Y', strtotime($tickets_spec["DATE_TICKET"])); ?></td>
                <td><?php echo $tickets_spec["MOTIF_TICKET"]; ?></td>
                <td><?php echo $tickets_spec["ID_EMPLOYE"]; ?></td>
                <td><?php echo $tickets_spec["ID_COMMANDE"]; ?></td>
            </tr>
        </tbody>
    </table>
<?php
}