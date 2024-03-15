<?php
$titre = "index";
require_once("PHP/modele.php");
require_once("Views/view_header.php");


if(isset($_GET["action"]) && $_GET["action"] == "accueil"){
    require_once("Views/view_menu_accueil.php");
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "liste_commandes":
                $titre = "Accueil";
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