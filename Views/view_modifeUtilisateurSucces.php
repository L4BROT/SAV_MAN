<?php
    if ($liste == "formok") {
?>
      <div class="alert alert-success text-center" role="alert">
        Employé modifié avec succés
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-success"><a href="index.php?action=afficherUtilisateur" style="text-decoration:none;color: #FFFFFF">Retour a la liste</a></button>
      </div>
<?php
    }elseif ($liste == 'mailidentique') {
      
?>
    <div class="alert alert-danger text-center" role="alert">
        Erreur lors de la modification<br>
        Le mail existe déjà<br>
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
      </div>  
<?php
    }elseif ($liste == 'resteAdmin') {
      
    ?>
        <div class="alert alert-danger text-center" role="alert">
            Erreur lors de la modification<br>
            Au moins un administrateur est requis <br>
          </div>
          <br>
          <br>
          <div class="text-center">
            <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
          </div>  
    <?php
    }elseif ($liste == 'nomErrone') {
      
    ?>
        <div class="alert alert-danger text-center" role="alert">
            Erreur lors de la modification<br>
            Le format nom est érroné<br>
          </div>
          <br>
          <br>
          <div class="text-center">
            <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
          </div>  
    <?php
    }elseif ($liste == 'prenomErrone') {
      
    ?>
        <div class="alert alert-danger text-center" role="alert">
            Erreur lors de la modification<br>
            Le format prénom est érroné<br>
          </div>
          <br>
          <br>
          <div class="text-center">
            <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
          </div>  
    <?php
    }
    ?>