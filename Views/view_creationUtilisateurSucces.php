<?php
    if ($add) {
?>
      <div class="alert alert-success text-center" role="alert">
        Employes ajouté avec succés
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
        Erreur lors de l'ajout<br>
        Veuillez verifier votre saisie<br>
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
      </div>
<?php
    }
?>