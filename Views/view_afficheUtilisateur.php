<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    
?>

        <table id='myTable' class="table table-dark table-striped table-bordered" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>E-mail</th>
                    <th>Type</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
<?php
 
    foreach ($liste as $ligne) {
?>
        
                <tr>
<?php
    
    $ligne_id = $ligne['ID_EMPLOYE'];
    $ligne_type = $ligne['TYPE_UTILISATEUR'];
    $ligne_nom = $ligne['NOM_UTILISATEUR'];
    $ligne_prenom = $ligne['PRENOM_UTILISATEUR'];
    $ligne_mail = $ligne['EMAIL'];
    $url ="modif&id=$ligne_id&Type=$ligne_type&Nom=$ligne_nom&Prenom=$ligne_prenom&Mail=$ligne_mail"; 
    $url2 ="supprime&id=$ligne_id&Type=$ligne_type&Nom=$ligne_nom&Prenom=$ligne_prenom&Mail=$ligne_mail";
    
?>
 
                    <td> <?php echo $ligne_id ?> </td>
                    <td> <?php echo $ligne_nom ?> </td>
                    <td> <?php echo $ligne_prenom ?> </td>
                    <td> <?php echo $ligne_mail ?> </td>
                    <td> <?php echo $ligne_type ?> </td>
                    <td class="col-2">
                        <button type="reset" class="btn btn-warning"><a href="index.php?action=<?php echo $url?>" style="text-decoration:none;color: #FFFFFF">Modifier</a></button>
                        <button type="reset" class="btn btn-danger"><a href="index.php?action=<?php echo $url2?>" style="text-decoration:none;color: #FFFFFF">Supprimer</a></button>
                    </td>
                </tr>
    
<?php
    }
?>
            </tbody>
        </table>
        <br>
