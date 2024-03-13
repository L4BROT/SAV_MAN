<?php
$titre = "Accueil";
require_once("../PHP/modele.php");
require_once("view_header.php");
?>
<form action="view_accueil.php" method="post">
    <input type="hidden" name="list_commandes" value="get">
    <input type="submit" value="Commandes">
</form>

<?php
if(isset($_POST["list_commandes"])){
    $commandes = getListCommandes();

    foreach($commandes as $command){
?>
        <section>
            <p>Identifiant Commande: <?php echo $command["ID_COMMANDE"]; ?></p>
            <p>Prix : <?php echo $command["PRIX_COMMANDE"]; ?></p>
            <p>Paiement : <?php echo $command["STATUT_PAIEMENT"]; ?></p>
            <p>Expédition : <?php echo $command["STATUT_EXPEDITION"]; ?></p>
            <p>Date commande : <?php echo $command["DATE_COMMANDE"]; ?></p>
            <p>Identifiant client : <?php echo $command["ID_CLIENT"]; ?></p>
        </section><br>
<?php
    }
}

require_once("view_footer.php");