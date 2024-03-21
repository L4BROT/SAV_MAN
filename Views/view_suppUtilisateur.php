<form action="index.php" method="POST" id="formUtilisateur">
    <div class="alert alert-danger" role="alert">
        Attention suppression en cours <br>Action irreversible !!!
    </div>
    <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input readonly type="text" class="form-control" id="id" name="id" aria-describedby="nomHelp" value="<?php echo $id ?>">
        <label for="idNom" class="form-label">Nom</label>
        <input readonly type="text" class="form-control" id="idNom" name="Nom" aria-describedby="nomHelp" value="<?php echo $nom ?>">
        <label for="Prenom" class="form-label">Prenom</label>
        <input readonly type="text" class="form-control" id="idPrenom" name="Prenom" aria-describedby="nomHelp" value="<?php echo $prenom ?>">
        <label for="Mail" class="form-label">Mail</label>
        <input readonly type="text" class="form-control" id="idMail" name="Mail" aria-describedby="nomHelp" value="<?php echo $mail ?>">
        <label for="idPrenom" class="form-label">Type</label>
        <input readonly type="text" class="form-control"  name="type" aria-describedby="nomHelp" value="<?php echo $typ ?>">
        

        <input type="hidden" class="form-control" id="idTel" name="key" aria-describedby="nomHelp" value="supprime">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Confirmer</button>
    <button type="reset" class="btn btn-danger"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Annuler</a></button>
</form>
<br>
<br>