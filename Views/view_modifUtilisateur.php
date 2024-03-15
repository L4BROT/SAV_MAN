<form action="index.php" method="POST" id="formUtilisateur">
    <div class="alert alert-warning" role="alert">
          Attention modification en cours !
    </div>
    <br>
   
    <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input readonly type="text" class="form-control" id="id" name="id" aria-describedby="nomHelp" value="<?php echo $id ?>">
        <label for="idNom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="idNom" name="Nom" aria-describedby="nomHelp" value="<?php echo $nom ?>">
        <label for="idPrenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="idPrenom" name="Prenom" aria-describedby="nomHelp" value="<?php echo $prenom ?>">
        
        <label for="Type">Type :</label>

        <select class="form-select" aria-label="Default select example" name="Type">
            <option value="<?php echo $typ ?>"><?php echo $typ ?></option>
            <option value="Admin">Admin</option>
            <option value="Hotline">Hotline</option>
            <option value="Employe">Employé</option>
        </select>

        <input type="hidden" class="form-control" id="idTel" name="key" aria-describedby="nomHelp" value="modif">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn btn-danger"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Annuler</a></button>
</form>
<br>
<br>