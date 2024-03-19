<?php       
    if(isset($commandes)){
?>
    <h2 id="titre_art">Toutes les commandes :</h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Date</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($commandes as $command){
?>
            <tr>
                <td><?php echo $command["id"];?></td>
                <td><?php echo date('d/m/Y', strtotime($command["date"]));?></td>
                <td>
                    <form action="index.php?action=accueil" method="post">
                        <input type="hidden" name ="action" value="detail_commande">
                        <input type="hidden" name="id_commande" value="<?php echo $command['id'];?>">
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

    if(isset($commande)){
?>
    <h2 id="titre_detail_commande">Détail commande :</h2>
    <table id="detail_commande" class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>Id commande</th>
                <th>Date</th>
                <th>Prix</th>
                <th>Paiement</th>
                <th>Expédition</th>
                <th>Client</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $commande["ID_COMMANDE"]; ?></td>
                <td><?php echo date('d/m/Y', strtotime($commande["DATE_COMMANDE"])); ?></td>
                <td><?php echo $commande["PRIX_COMMANDE"] . " €"; ?></td>
                <td><?php echo $commande["STATUT_PAIEMENT"]; ?></td>
                <td><?php echo $commande["STATUT_EXPEDITION"]; ?></td>
                <td>
                    <?php 
                        $name = getNameUser($commande["ID_CLIENT"]);
                        echo $name["nom"] . " " . $name["prenom"];
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
<?php
    }

    if(isset($articles)){
?>

        <h2 id="titre_art">Contenu :</h2>

        <table id="article_tab" class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Prix</th>
                    <th>Couleur</th>
                    <th>Garantie</th>
                </tr>
            </thead>
            <tbody>
<?php
            foreach($articles as $article){
?>
                <tr>
                    <td><?php echo $article["LIBELLE_ART"]; ?></td>
                    <td><?php echo $article["PRIX_ART"] . " €"; ?></td>
                    <td><?php echo $article["COULEUR_ART"]; ?></td>
                    <td><?php echo $article["GARANTIE_ART"] . " ans."; ?></td>
                </tr>
<?php
            }
?>
            </tbody>
        </table>

        <div id="btnVoirTickets">
            <form action="index.php?action=accueil" method="post">
                <input type="hidden" name ="action" value="tickets_spec">
                <input type="hidden" name="id_commande" value="<?php echo $id;?>">
                <input type="submit" value="Voir Tickets" class="btn btn-primary">
            </form>
            <button type="reset" class="btn btn-danger"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="text-decoration:none;color: #FFFFFF">Retour</a></button>
        </div>
<?php
    }

    if(isset($listArticles)){
?>
        <h2 id="titre_art">Liste articles :</h2>
        <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Prix</th>
                    <th>Couleur</th>
                    <th>Garantie</th>
                    <th>Qte Stock</th>
                    <th>Qte SAV</th>
                    <th>Qte Rebus</th>
                </tr>
            </thead>
            <tbody>
<?php
            foreach($listArticles as $listArticle){
?>
                <tr>
                    <td><?php echo $listArticle["nom"]; ?></td>
                    <td><?php echo $listArticle["prix"] . " €"; ?></td>
                    <td><?php echo $listArticle["couleur"]; ?></td>
                    <td><?php echo $listArticle["garantie"] . " Ans"; ?></td>
                    <td><?php echo $listArticle["stock"]; ?></td>
                    <td><?php echo $listArticle["sav"]; ?></td>
                    <td><?php echo $listArticle["rebus"]; ?></td>
                </tr>
<?php
            }
?>
            </tbody>
        </table>
<?php
    }