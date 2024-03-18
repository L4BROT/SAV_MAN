function confirmLogout() {
    $('#confirmLogoutModal').modal('show');
    //alert("Ceci est un message d'alerte !");
}

function logout() {
    window.location.href = "indexCo.php?action=deconnexion";
}