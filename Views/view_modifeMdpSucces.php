<?php
    if ($newMdp) {
?>
      <div class="alert alert-success text-center" role="alert">
        Le mot de passe a etait reinitialisé avec succés
      </div>
      <br>
      <br>
<?php
    }else {
?>
      <div class="alert alert-danger text-center" role="alert">
        Erreur lors de la reinitiallisation<br>
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