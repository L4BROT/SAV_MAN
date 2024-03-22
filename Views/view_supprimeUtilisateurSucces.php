<?php
    if ($sup == "formok") {
?>
      <div class="alert alert-success text-center" role="alert">
        Employé supprimé avec succés
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-success"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Retour à la liste</a></button>
      </div>
<?php
    }elseif($sup == "ticketenCours") {
?>
      <div class="alert alert-danger text-center" role="alert">
        Erreur lors de la suppression<br>
        Ticket en cours de traitement par l'utilisateur
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Retour à la liste</a></button>
      </div>
     
<?php
    }elseif($sup =="adminSeul") {
?>
      <div class="alert alert-danger text-center" role="alert">
        Erreur lors de la suppression<br>
        Au moin un administrateur est requis
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Retour à la liste</a></button>
      </div>
      
<?php
    }
?>