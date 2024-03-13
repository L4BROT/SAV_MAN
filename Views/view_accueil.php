<?php
$titre = "Accueil";
require_once("../PHP/modele.php");
require_once("view_header.php");
?>

<form action="view_accueil.php" method="post">
    <input type="hidden" name="liste_commandes">
    <input type="submit" value="Commandes">
</form>

<?php
if(isset($_POST["detail_commande"])){
    $command = getDetailCommandes($_POST["id_commande"]);
?>
    <section>
        <p>Identifiant Commande: <?php echo $command["ID_COMMANDE"]; ?></p>
        <p>Prix : <?php echo $command["PRIX_COMMANDE"]; ?></p>
        <p>Paiement : <?php echo $command["STATUT_PAIEMENT"]; ?></p>
        <p>Expédition : <?php echo $command["STATUT_EXPEDITION"]; ?></p>
        <p>Date commande : <?php echo $command["DATE_COMMANDE"]; ?></p>
        <p>Nom client : 
            <?php 
                $name = getNameUser($command["ID_CLIENT"]);
                echo $name["nom"] . " " . $name["prenom"];
            ?>
        </p>
    </section><br>
<?php
}

if(isset($_POST["liste_commandes"])){
    $commandes = getListCommandes();

    foreach($commandes as $command){
?>
        <section>ID : <?php echo $command["id"];?> Date : <?php echo $command["date"];?>
            <form action="view_accueil.php" method="post">
                <input type="hidden" name="detail_commande">
                <input type="hidden" name="id_commande" value="<?php echo $command["id"];?>">
                <input type="submit" value="Détail Commande">
            </form>
        </section><br>
<?php
    }
}

require_once("view_footer.php");