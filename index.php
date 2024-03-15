<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$titre = "index";

require_once("PHP/modele.php");



if(isset($_GET["action"]) && $_GET["action"] == "accueil"){
    require_once("Views/view_header.php");
    require_once("Views/view_menu_accueil.php");
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "liste_commandes":
                $titre = "Accueil";
               /*if ($typeUtilisateur == 'Admin') {
                    require_once("Views/view_header_admin.php");
                }else {
                    require_once("Views/view_header.php");
                }
                $commandes = getListCommandes();
                require("Views/view_accueil.php");
                break;*/
                require_once("Views/view_header.php");
                $commandes = getListCommandes();
                require("Views/view_accueil.php");
                break;
    
            case "detail_commande":
                $titre = "Accueil";
                require_once("Views/view_header.php");
                $id = $_POST["id_commande"];
                $commande = getDetailCommandes($id);
                $articles = getArticlesCommande($id);
                require("Views/view_accueil.php");
                break;
            
            case "articles":
                $titre = "Accueil";
                require_once("Views/view_header.php");
                $listArticles = getListArticles();
                require("Views/view_accueil.php");
                break;
        }
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "expedition"){
    require_once("Views/view_menu_expedition.php");
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "expe_attente":
                $titre = "Expéditions";
                require_once("Views/view_header.php");
                $expe_attente = getExpeAttente();
                require_once("Views/view_expedition.php");
                break;
    
            case "expe_en_cours":
                $titre = "Expéditions";
                require_once("Views/view_header.php");
                $expe_en_cours = getExpeEnCours();
                require_once("Views/view_expedition.php");
                break;
            
            case "expedier":
                $titre = "Expéditions";
                require_once("Views/view_header.php");
                $id = $_POST["id_commande"];
                $expedier = showBeforeExpe($id);
                require_once("Views/view_expedition.php");
                break;

            case "valider_expe":
                $titre = "Expéditions";
                require_once("Views/view_header.php");
                $id = $_POST["id_commande"];
                echo $id;
                require_once("Views/view_expedition.php");
                break;
    
            case "expe_termine":
                $titre = "Expéditions";
                require_once("Views/view_header.php");
                break;

            case "expe_tout_voir":
                $titre = "Expéditions";
                require_once("Views/view_header.php");
                break;
        }
    }
}

if (isset($_POST['key'])) {
    $action = $_POST['key'];
    if ($action == 'creation') {
        $titre = "Creer un utilisateur";
        require_once("Views/view_header_admin.php");
        
        $nom = $_POST['Nom'];
        $mdp = $_POST['mdp'];
        $typ = $_POST['btnType'];
        $prenom = $_POST['Prenom'];
        
        try {
            
            $add = addEmploye($mdp,$typ,$nom,$prenom);
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
        
        $nom = $_POST['Nom'];
        $typ = $_POST['Type'];
        $id = $_POST['id'];
        $prenom = $_POST['Prenom'];
        
        try {
            $liste = modifierUtilisateur($nom,$id,$typ,$prenom);
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
   
        try {
            
            $sup = supprimeEmploye($id);
            //print_r($add);
            require('Views/view_supprimeUtilisateurSucces.php');
        } catch (Exception $th) {
            die("Probleme lors de la suppression");
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
        
        require_once("Views/view_modifUtilisateur.php");
        
        require_once("Views/view_footer.php");
    }if ($action == 'supprime') {
       
        $titre = "Supprimer l'utilisateurs";
        require_once("Views/view_header_admin.php");
        $nom = $_GET['Nom'];
        $id = $_GET['id'];
        $typ = $_GET['Type'];
        $prenom = $_GET['Prenom'];
        
        require_once("Views/view_suppUtilisateur.php");
        
        require_once("Views/view_footer.php");
    }
}else {
    $titre = "Accueil";
    require_once("Views/view_header_admin.php");
    require_once("Views/view_menu_accueil.php");
    require_once("Views/view_footer.php");
}

?>

<script>
    let table = new DataTable('#myTable', {
        scrollY: 400,
        // scrollX: 500,
        columnDefs: [
            { type: "extract-date-fr", targets: [1]}
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
            search: "Rechercher une commande : ",
            zeroRecords: "Aucune commande trouvée",
            
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
</script>

<?php
require_once("Views/view_footer.php");