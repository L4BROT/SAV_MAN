function confirmLogout() {
    $('#confirmLogoutModal').modal('show');
    //alert("Ceci est un message d'alerte !");
}

function logout() {
    window.location.href = 'Views/view_connexion.php';
}