<?php
    if ($liste) {
?>
      <div class="alert alert-success text-center" role="alert">
        Employes modifier avec succés
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-success"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Retour a la liste</a></button>
      </div>
<?php
    }else {
?>
      <div class="alert alert-danger text-center" role="alert">
        Erreur lors de la modification<br>
        Veuillez verifier votre saisie
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger  "><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="text-decoration:none;color: #FFFFFF">Retour au formulaire de modification</a></button>
      </div>
<?php
    }
?>