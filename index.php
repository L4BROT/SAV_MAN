<?php
session_start();
require_once("PHP/modele.php");

// Test la connexion, et redirige si aucun utilisateur connecté
if (!isset($_SESSION['TYPE_UTILISATEUR'])) {
    header("location:indexCo.php");
}

// Affichage onglet accueil
if (isset($_GET["action"]) && $_GET["action"] == "accueil") {
    $titre = "accueil";

    // Affichage dynamique de la navbar suivant le niveau d'autorisation
    if ($_SESSION['TYPE_UTILISATEUR'] == 'Admin'){
        require_once("Views/view_header_admin.php");
    }
    else if($_SESSION['TYPE_UTILISATEUR'] == 'SAV'){
        require_once("Views/view_header.php");
    } 
    else {
        require_once("Views/view_header_hotline.php");
    }

    // Affichage sous-menu de la page accueil (Commandes, Articles)
    require_once("Views/view_menu_accueil.php");

    // Affichage des scénarios page accueil
    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "liste_commandes":
                $commandes = getListCommandes();
                require("Views/view_accueil.php");
                break;

            case "detail_commande":
                $id = $_POST["id_commande"];
                $commande = getDetailCommandes($id);
                $articles = getArticlesCommande($id);
                require("Views/view_accueil.php");
                break;

            case "articles":
                $listArticles = getListArticles();
                require("Views/view_accueil.php");
                break;

            case "tickets_spec":
                $id = $_POST["id_commande"];
                $tickets_spec = getTicketsSpec($id);
                require_once("Views/view_tickets.php");
                break;
        }
    } else {
        if ($_SESSION['TYPE_UTILISATEUR'] == 'Admin') {
            require_once("Views/view_header_admin.php");
        }
        else if($_SESSION['TYPE_UTILISATEUR'] == 'SAV'){
            require_once("Views/view_header.php");
        } 
        else {
            require_once("Views/view_header_hotline.php");
        }

        $commandes = getListCommandes();
        require("Views/view_accueil.php");
    }
}

// if (isset($_GET["action"]) && $_GET["action"] == "sav") {
//     $titre = "sav";

//     // Affichage dynamique de la navbar suivant le niveau d'autorisation
//     if ($_SESSION['TYPE_UTILISATEUR'] == 'Admin'){
//         require_once("Views/view_header_admin.php");
//     }
//     else if($_SESSION['TYPE_UTILISATEUR'] == 'SAV'){
//         require_once("Views/view_header.php");
//     } 
//     else {
//         require_once("Views/view_header_hotline.php");
//     }

//     // Affichage sous-menu de la page sav
//     require_once("Views/view_menu_sav.php");

//     // Affichage des scénarios page sav
//     if (isset($_POST["action"])) {
//         switch ($_POST["action"]) {
//             case "liste_SAV":
//                 $liste_SAV = getListSAV();
//                 require_once("Views/view_sav.php");
//                 break;

//             case "liste_rebus":
//                 $liste_rebus = getListRebus();
//                 require_once("Views/view_sav.php");
//                 break;
//         }
//     }
//     else{
//         $liste_SAV = getListSAV();
//         require_once("Views/view_sav.php");
//     }
// }


if (isset($_GET["action"]) && $_GET["action"] == "sav") {
    $titre = "SAV";

    if ($_SESSION['TYPE_UTILISATEUR'] == 'Admin') {
        require_once("Views/view_header_admin.php");
    }
    else if($_SESSION['TYPE_UTILISATEUR'] == 'SAV'){
        require_once("Views/view_header.php");
    } 
    else {
        require_once("Views/view_header_hotline.php");
    }

    require_once("Views/view_menu_SAV.php");
    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "liste_SAV":
                $titre = "Liste SAV";
                $retour_sav = getListSAV();
                require("Views/view_liste_SAV.php");
                break;
    
            case "detail_SAV":
                $titre = "Detail du retour";
                $id = $_POST["id_retour"];
                $detail_retour = getDetailSAV($id);
                require("Views/view_liste_SAV.php");
                break;

            case "liste_rebus":
                $titre = "Liste rebus";
                $stock_rebus = getListRebus();
                require("Views/view_liste_SAV.php");
                break;
        }
    }
    else{
        $titre = "Liste SAV";
        $retour_sav = getListSAV();
        require("Views/view_liste_SAV.php");
    }
}


// Affichage onglet Expédition
if (isset($_GET["action"]) && $_GET["action"] == "expedition") {
    $titre = "Expéditions";

    // Affichage dynamique de la navbar suivant le niveau d'autorisation
    if ($_SESSION['TYPE_UTILISATEUR'] == 'Admin') {
        require_once("Views/view_header_admin.php");
    }
    else if($_SESSION['TYPE_UTILISATEUR'] == 'SAV'){
        require_once("Views/view_header.php");
    } 
    else {
        require_once("Views/view_header_hotline.php");
    }

    // Affichage sous-menu expédition
    require_once("Views/view_menu_expedition.php");

    // Affichage des scénarios page expédition
    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "expe_attente":
                $expe_attente = getExpeAttente();
                require_once("Views/view_expedition.php");
                break;

            case "expe_en_cours":
                $expe_en_cours = getExpeEnCours();
                require_once("Views/view_expedition.php");
                break;

            case "expedier":
                $id = $_POST["id_commande"];
                $expedier = showBeforeExpe($id);
                require_once("Views/view_expedition.php");
                break;

            case "valider_expe":
                $id = $_POST["id_commande"];
                valider_expe($id);
                $employe = $_SESSION['ID_EMPLOYE'];
                ticketExpe($id, $employe);
                $expeOK = 1;
                require_once("Views/view_expedition.php");
                break;

            case "expe_termine":
                $expeFinies = getExpeFinis();
                require_once("Views/view_expedition.php");
                break;

            case "expe_tout_voir":
                $allExpe = getAllExpe();
                require_once("Views/view_expedition.php");
                break;
        }
    } else {
        $allExpe = getAllExpe();
        require_once("Views/view_expedition.php");
    }
}

// Affichage onglet Tickets
if (isset($_GET["action"]) && $_GET["action"] == "ticket") {
    $titre = "Tickets";

    // Affichage dynamique de la navbar suivant le niveau d'autorisation
    if ($_SESSION['TYPE_UTILISATEUR'] == 'Admin') {
        require_once("Views/view_header_admin.php");
    }
    else if($_SESSION['TYPE_UTILISATEUR'] == 'SAV'){
        require_once("Views/view_header.php");
    } 
    else {
        require_once("Views/view_header_hotline.php");
    }

    // Affichage sous-menu tickets
    require_once("Views/view_menu_tickets.php");
    
    // Affichage des scénarios page tickets
    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "tickets_sav":


                // require_once("Views/view_tickets.php");
                break;
            
            case "tickets_expe":
                $tickets_expe = getTicketsExpe();
                require_once("Views/view_tickets.php");
                break;

            case "all_tickets":
                $allTickets = getAllTickets();
                require_once("Views/view_tickets.php");
                break;

            case "crea_ticket":
                $creaTicket = true;
                $_SESSION["id_commande"] = $_POST["id_commande"];
                $_SESSION["id_employe"] = $_POST["id_employe"];
                require_once("Views/view_tickets.php");
                break;
            
            case "validerCrea":
                $id = $_SESSION["id_commande"];
                $id_employe = $_SESSION["id_employe"];
                $motif_ticket = $_POST["motif_ticket"];
                creaTicket($id, $id_employe, $motif_ticket);
                $creaOK = true;
                require_once("Views/view_tickets.php");
                break;

            case "validerCrea2":
                $id = $_SESSION["id_commande"];
                $id_employe = $_SESSION["id_employe"];
                $id_article = $_SESSION["id_article"];
                $motif_ticket = $_POST["motif_ticket"];
                creaTicket2($id, $id_employe, $motif_ticket, $id_article);
                $creaOK = true;
                require_once("Views/view_tickets.php");
                break;
        }
    }
    else{
        $allTickets = getAllTickets();
        require_once("Views/view_tickets.php");
    }
}

if (isset($_POST['key'])) {
    $action = $_POST['key'];
    if ($action == 'creation') {
        $titre = "Creer un utilisateur";
        require_once("Views/view_header_admin.php");
        
        $nom = trim($_POST['Nom']);
        $mdp = $_POST['mdp'];
        $typ = trim($_POST['btnType']);
        $prenom = trim($_POST['Prenom']);
        $mail = trim($_POST['Mail']);
        
        try {
            
            $add = addEmploye($mdp,$typ,$nom,$prenom,$mail);
            //print_r($add);
            require('Views/view_creationUtilisateurSucces.php');
        } catch (Exception $th) {
            die("Probleme lors de l'ajout");
        }
        require_once("Views/view_footer.php");
    }
    if ($action == 'modif') {
        $titre = "Modification de l'utilisateur";
        require_once("Views/view_header_admin.php");
        
        $nom = trim($_POST['Nom']);
        $typ = trim($_POST['Type']);
        $id = trim($_POST['id']);
        $prenom = trim($_POST['Prenom']);
        $mail = trim($_POST['Mail']);
        
        try {
           
            $liste = modifierUtilisateur($nom,$id,$typ,$prenom,$mail);
            require_once("Views/view_modifeUtilisateurSucces.php");
        } catch (Exception $th) {
            die("Probleme lors de la modification");
        }
        
        require_once("Views/view_footer.php");
    }
    if ($action == 'supprime') {
        $titre = "Supprimer l'utilisateur";
        require_once("Views/view_header_admin.php");
        $id = $_POST['id'];
        $typ =$_POST['type'];

        try {
            
            $sup = supprimeEmploye($id,$typ);
            //print_r($add);
            require('Views/view_supprimeUtilisateurSucces.php');
        } catch (Exception $th) {
            die("Probleme lors de la suppression");
        }
        require_once("Views/view_footer.php");
    }if ($action == 'modifMdp') {
        $titre = "Modification du mot de passe";
        require_once("Views/view_header_admin.php");
        
        $nom = $_POST['Nom'];
        $typ = $_POST['Type'];
        $id = $_POST['id'];
        $prenom = $_POST['Prenom'];
        $mdp = $_POST['mdp'];
        $confirmMdp = $_POST['confirmMdp'];
        
        try {
            $newMdp = modifierMotDePasse($id,$mdp,$confirmMdp);
            require_once("Views/view_modifeMdpSucces.php");
        } catch (Exception $th) {
            die("Probleme lors de la reinitialisation");
        }
        
        require_once("Views/view_footer.php");
    }
}elseif(isset($_GET['action'])){
    $action = $_GET['action'];
    if ($action == 'creerUtilisateur') {
        $titre = "Creer un utilisateur";
        require_once("Views/view_header_admin.php");
        require_once("Views/view_creerUtilisateur.php");
        require_once("Views/view_footer.php");
    }if ($action == 'afficherUtilisateur') {
        
        $titre = "Afficher les utilisateurs";
        require_once("Views/view_header_admin.php");
        try {
            $liste = afficheUtilisateur();
        require_once("Views/view_afficheUtilisateur.php");
        } catch (Exception $th) {
            die("Probleme lors de l'affichage");
        }
        
        require_once("Views/view_footer.php");
    }if ($action == 'modif') {
    
        $titre = "Modifier l'utilisateurs";
        require_once("Views/view_header_admin.php");
        $nom = $_GET['Nom'];
        $id = $_GET['id'];
        $typ = $_GET['Type'];
        $prenom = $_GET['Prenom'];
        $mail = $_GET['Mail'];
        
        require_once("Views/view_modifUtilisateur.php");
        
        require_once("Views/view_footer.php");
    }if ($action == 'supprime') {
    
        $titre = "Supprimer l'utilisateurs";
        require_once("Views/view_header_admin.php");
        $nom = $_GET['Nom'];
        $id = $_GET['id'];
        $typ = $_GET['Type'];
        $prenom = $_GET['Prenom'];
        $mail = $_GET['Mail'];
        
        require_once("Views/view_suppUtilisateur.php");
        
        require_once("Views/view_footer.php");
    }if ($action == 'resetMdp') {
    
        $titre = "Reinitialiser le mot de passe";
        require_once("Views/view_header_admin.php");
        $nom = $_GET['Nom'];
        $id = $_GET['id'];
        $typ = $_GET['Type'];
        $prenom = $_GET['Prenom'];
        
        require_once("Views/view_reset_mdp.php");
        
    }
}else {
    $titre = "Accueil";
    require_once("Views/view_header_admin.php");
    require_once("Views/view_menu_accueil.php");
    require_once("Views/view_footer.php");
}

?>

<!-- Script pour le dataTable -->
<script>
     var saisie2=document.getElementById( 'newMdp' );
    var saisie =document.getElementById( 'confMpd' );

    var url = document.location.href;
    let table = new DataTable('#myTable', {
        scrollY: 400,
        // scrollX: 500,
        columnDefs: [
            { type: "extract-date-fr", targets: [1] }
        ],
        //Creer le tableau en francais
        language: {
            zeroRecords: "Aucun résultat trouvé",
            info: "",
            infoEmpty: "",
            infoFiltered: "",
            loadingRecords: "Chargement...",
            processing: "Traitement...",
            lengthMenu: "",
            search: "Rechercher : ",
            zeroRecords: "Aucun résultat",

            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent",
            },
        },
        aria: {
            sortAscending: ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant",
        },
        iDisplayLength: 30,
        searching: true,
        responsive: true,
        select: true
    });
    ///////////////////////////////////////////////////////
    if (url.includes('resetMdp')) {

        var onReset =document.getElementById( 'monBoutonOnReset' );
        var offReset =document.getElementById( 'monBoutonOffReset' );
        var onResetConf =document.getElementById( 'monBoutonOnResetConf' );
        var offResetConf =document.getElementById( 'monBoutonOffResetConf' );
        var saisie2=document.getElementById( 'newMdp' );
        var saisie =document.getElementById( 'confMpd' );

        onReset.addEventListener( "click", function() {
            var attribut = saisie2.getAttribute( 'type');
            if(attribut == 'password'){
                saisie2.type='text';
                onReset.style.display="none";
                offReset.style.display="flex";
            }
        });

        offReset.addEventListener( "click", function() {
            var attribut = saisie2.getAttribute( 'type');
            if(attribut == 'text'){
                saisie2.type='password';
                onReset.style.display="flex";
                offReset.style.display="none";
            }
        });
        onResetConf.addEventListener( "click", function() {
            
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'password'){
                saisie.type='text';
                onResetConf.style.display="none";
                offResetConf.style.display="flex";
            }
        });

        offResetConf.addEventListener( "click", function() {
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'text'){
                saisie.type='password';
                onResetConf.style.display="flex";
                offResetConf.style.display="none";
            }
        });
        }
        /////////////////////////////////////////////////////////
        if (url.includes('creerUtilisateur')) {
        var saisie=document.getElementById( 'newMDP' );
        var on =document.getElementById( 'monBoutonOn' );
        var off =document.getElementById( 'monBoutonOff' );
        on.addEventListener( "click", function() {
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'password'){
                saisie.type='text';
                on.style.display="none";
                off.style.display="flex";
            }
        });

        off.addEventListener( "click", function() {
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'text'){
                saisie.type='password';
                on.style.display="flex";
                off.style.display="none";
            }
        });
    }
</script>

<?php
require_once("Views/view_footer.php");