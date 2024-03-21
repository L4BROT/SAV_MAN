<form action="index.php" method="POST" id="formUtilisateur">
    <div class="alert alert-warning" role="alert">
          Vous etes sur le point de reinitialiser le mot de passe pour <?php echo $nom.", ".$prenom." avec l'Id n° ".$id." embauché comme ".$typ  ?>
    </div>
    <br>

    <label for="newMDP" class="form-label">Nouveau mot de passe</label>
    <p>
    <input type="password" class="form-control" id="newMdp" name="mdp" autocomplete="off" required>

    <button type="button" class="btn btn-secondary" id="monBoutonOnReset">
        <span class="material-symbols-outlined">
            visibility
        </span>
    </button>
    <button type="button" class="btn btn-secondary" id="monBoutonOffReset">
        <span class="material-symbols-outlined">
            visibility_off
        </span>
    </button>
    <br>

    <label for="confMpd" class="form-label">Confirmer le mot de passe</label>
    <input type="password" class="form-control" id="confMpd" name="confirmMdp" autocomplete="off" required>

    <button type="button" class="btn btn-secondary" id="monBoutonOnResetConf">
        <span class="material-symbols-outlined">
            visibility
        </span>
    </button>
    <button type="button" class="btn btn-secondary" id="monBoutonOffResetConf">
        <span class="material-symbols-outlined">
            visibility_off
        </span>
    </button>

    <div id="nomHelp" class="form-text">- minimum de 8 caractères.<br>- au moins une lettre majuscule.<br>- au moins une lettre minuscule.<br>- au moins un chiffre<br>- au moins un de ces caractères spéciaux: $ @ % * + - _ !</div><br>

    <input readonly type="hidden" class="form-control" id="id" name="id" aria-describedby="nomHelp" value="<?php echo $id ?>">
    
    <input type="hidden" class="form-control" id="idNom" name="Nom" aria-describedby="nomHelp" value="<?php echo $nom ?>">

    <input type="hidden" class="form-control" id="idType" name="Type" aria-describedby="nomHelp" value="<?php echo $typ ?>">
   
    <input type="hidden" class="form-control" id="idPrenom" name="Prenom" aria-describedby="nomHelp" value="<?php echo $prenom ?>">
    <input type="hidden" class="form-control" id="idTel" name="key" aria-describedby="nomHelp" value="modifMdp">
    <br>

    <button type="submit" class="btn btn-primary">Valider</button>
    <button type="reset" class="btn btn-danger  ">
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="text-decoration:none;color: #FFFFFF">Retour</a>
    </button>

</form>
