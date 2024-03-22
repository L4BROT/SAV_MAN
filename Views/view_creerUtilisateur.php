<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
?>

<form action="index.php" method="POST" id="formUtilisateur">
    <div class="alert alert-warning" role="alert">
          Vous etes sur le point de creer un utilisateur
    </div>
    <br>
    <div class="mb-3">
        <label for="idNom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="idNom" name="Nom" required>
        <label for="idPrenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="idPrenom" name="Prenom" required>
        <label for="idMail" class="form-label">Mail</label>
        <input type="email" class="form-control" id="idMail" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" name="Mail" required>


        
      
        <label for="idMdp" class="form-label">Mot de passe</label>
        
        <p>
        
        <input type="password" class="form-control" id="newMDP" name="mdp" autocomplete="off" required>

        <button type="button" class="btn btn-secondary" id="monBoutonOn">
            <span class="material-symbols-outlined">
                visibility
            </span>
        </button>
        <button type="button" class="btn btn-secondary"  id="monBoutonOff">
            <span class="material-symbols-outlined">
                visibility_off
            </span>
        </button>
        
        <div id="nomHelp" class="form-text">- minimum de 8 caractères.<br>- au moins une lettre majuscule.<br>- au moins une lettre minuscule.<br>- au moins un chiffre<br>- au moins un de ces caractères spéciaux: $ @ % * + - _ !</div><br>
        
        <fieldset>
            <legend>Type d'utilisateur</legend>

            <div>
                <input type="radio" id="admin" name="btnType" value="Admin" checked />
                <label for="huey">Admin</label>
            </div>

            <div>
                <input type="radio" id="hotline" name="btnType" value="Hotline" checked/>
                <label for="dewey">Hotline</label>
            </div>

            <div>
                <input type="radio" id="employe" name="btnType" value="SAV" checked/>
                <label for="louie">SAV</label>
            </div>
        </fieldset>
        <input type="hidden" class="form-control"  name="key" aria-describedby="nomHelp" value="creation">
        
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <button type="reset" class="btn btn-danger">Annuler</button>
</form>
<br>
<br>