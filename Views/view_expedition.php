<?php       
    if(isset($expe_attente)){
?>
    <h2 class="titre_expe">Expéditions en attente :</h2>
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
    <h2 class="titre_expe"><?php echo 'Expéditions en cours :';?></h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Date expédition</th>
                <th>Employé</th>
                <th>Statut expédition</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($expe_en_cours as $expe){
            $id = $expe["id"];
            $date_expe = getDateExpe($id);
        
            if($expe["statut"] == "En cours" || $expe["statut"] == "Livrée"){
                $employe = idEmployeFromCom($id);
                $res = $employe["ID_EMPLOYE"];
                $val = getNameEmploye($res);
                $nom = $val["NOM_UTILISATEUR"] . " " . $val["PRENOM_UTILISATEUR"];
            }
            else{
                $nom = "";
            }

            if($date_expe == false){
                $date_expe = "En attente";
            }
            else{
                $date_expe = date('d/m/Y', strtotime($date_expe["date"]));
            }
            
?>
            <tr>
                <td><?php echo $expe["id"];?></td>
                <td><?php echo $date_expe;?></td>
                <td><?php echo $nom;?></td>
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
        <h2 class="titre_expe">Valider l'expédition :</h2>
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
        <button type="reset" id="btn_retour" class="btn btn-danger"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="text-decoration:none;color: #FFFFFF">Retour</a></button>
<?php
    }

    if(isset($allExpe)){
?>
    <h2 class="titre_expe"><?php echo 'Toutes les expéditions :';?></h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Date expédition</th>
                <th>Employé</th>
                <th>Statut expédition</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($allExpe as $expe){
            $id = $expe["id"];
            $date_expe = getDateExpe($id);

            if($expe["statut"] == "En cours" || $expe["statut"] == "Livrée"){
                $employe = idEmployeFromCom($id);
                $res = $employe["ID_EMPLOYE"];
                $val = getNameEmploye($res);
                $nom = $val["NOM_UTILISATEUR"] . " " . $val["PRENOM_UTILISATEUR"];
            }
            else{
                $nom = "";
            }
        
            if($date_expe == false){
                $date_expe = "";
            }
            else{
                $date_expe = date('d/m/Y', strtotime($date_expe["date"]));
            }
            
?>
            <tr>
                <td><?php echo $expe["id"];?></td>
                <td><?php echo $date_expe;?></td>
                <td><?php echo $nom;?></td>
                <td><?php echo $expe["statut"];?></td>
            </tr>
<?php
        }
?>
        </tbody>
        </table>
<?php
    }

if(isset($expeFinies)){
?>
    <h2 class="titre_expe"><?php echo 'Expéditions terminées :';?></h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Date expédition</th>
                <th>Employé</th>
                <th>Prix commande</th>
                <th>Statut expédition</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($expeFinies as $expe){
            $id = $expe["id"];
            $date_expe = getDateExpe($id);
        
            if($expe["statut"] == "En cours" || $expe["statut"] == "Livrée"){
                $employe = idEmployeFromCom($id);
                $res = $employe["ID_EMPLOYE"];
                $val = getNameEmploye($res);
                $nom = $val["NOM_UTILISATEUR"] . " " . $val["PRENOM_UTILISATEUR"];
            }
            else{
                $nom = "";
            }

            if($date_expe == false){
                $date_expe = "En attente";
            }
            else{
                $date_expe = date('d/m/Y', strtotime($date_expe["date"]));
            }
            
?>
            <tr>
                <td><?php echo $expe["id"];?></td>
                <td><?php echo $date_expe;?></td>
                <td><?php echo $nom;?></td>
                <td><?php echo $expe["prix"] . " €";?></td>
                <td><?php echo $expe["statut"];?></td>
            </tr>
<?php
        }
?>
        </tbody>
        </table>
<?php
    }
if(isset($expeOK) && $expeOK == 1){
?>
    <h3>Commande bien expédiée</h3>
<?php
}