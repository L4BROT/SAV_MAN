<?php
    if ($sup) {
?>
      <div class="alert alert-success text-center" role="alert">
        Employes supprimé avec succés
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
        Erreur lors de la suppression<br>
        
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Retour a la liste</a></button>
      </div>
     
<?php
    }
?>