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