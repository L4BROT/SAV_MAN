<div id="btn_accueil">
    <form action="index.php?action=expedition" method="post">
        <input type="hidden" name="action" value="expe_attente">
        <input type="submit" value="En attente" class="btn btn-primary position_btn">
    </form>

    <form action="index.php?action=expedition" method="post">
        <input type="hidden" name="action" value="expe_en_cours">
        <input type="submit" value="En cours" class="btn btn-primary position_btn">
    </form>

    <form action="index.php?action=expedition" method="post">
        <input type="hidden" name="action" value="expe_termine">
        <input type="submit" value="Terminées" class="btn btn-primary position_btn">
    </form>

    <form action="index.php?action=expedition" method="post">
        <input type="hidden" name="action" value="expe_tout_voir">
        <input type="submit" value="Tout voir" class="btn btn-primary position_btn">
    </form>
</div>