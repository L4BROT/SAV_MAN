<?php
    if ($add == "formok") {
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
    }elseif ($add == 'mailidentique') {
      
?>
    <div class="alert alert-danger text-center" role="alert">
        Erreur lors de l'ajout<br>
        Le mail existe deja<br>
      </div>
      <br>
      <br>
      <div class="text-center">
        <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
      </div>  
<?php
    }elseif ($add == 'mdpErrone') {
      
    ?>
        <div class="alert alert-danger text-center" role="alert">
            Erreur lors de l'ajout<br>
            Le format de mot de passe est érroné<br>
          </div>
          <br>
          <br>
          <div class="text-center">
            <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
          </div>  
    <?php
    }elseif ($add == 'nomErrone') {
      
    ?>
        <div class="alert alert-danger text-center" role="alert">
            Erreur lors de l'ajout<br>
            Le format nom est érroné<br>
          </div>
          <br>
          <br>
          <div class="text-center">
            <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
          </div>  
    <?php
    }elseif ($add == 'prenomErrone') {
      
    ?>
        <div class="alert alert-danger text-center" role="alert">
            Erreur lors de l'ajout<br>
            Le format prenom est érroné<br>
          </div>
          <br>
          <br>
          <div class="text-center">
            <button type="reset" class="btn btn-danger" onclick="history.go(-1)">Retour</button>
          </div>  
    <?php
    }
    ?>