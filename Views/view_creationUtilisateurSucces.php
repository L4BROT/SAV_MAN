<?php
    if ($add) {
?>
      <div class="alert alert-success text-center" role="alert">
        Employes ajouté avec succés
      </div>
      <br>
      <br>
<?php
    }else {
?>
      <div class="alert alert-danger text-center" role="alert">
        Erreur lors de l'ajout<br>
        Veuillez verifier votre saisie<br>
        Ou le mot de passe existe deja
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="text-decoration:none;color: #FFFFFF">Retour formulaire</a></button>
      </div>
<?php
    }
?>