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
        require_once("Views/view_header.php");
        require_once("Views/view_menu_expedition.php");
        if(isset($_POST["action"])){
            switch($_POST["action"]){
                case "expe_attente":
                    $titre = "Expéditions";
                    
                    $expe_attente = getExpeAttente();
                    require_once("Views/view_expedition.php");
                    break;
        
                case "expe_en_cours":
                    $titre = "Expéditions";
                    
                    $expe_en_cours = getExpeEnCours();
                    require_once("Views/view_expedition.php");
                    break;
                
                case "expedier":
                    $titre = "Expéditions";
                    
                    $id = $_POST["id_commande"];
                    $expedier = showBeforeExpe($id);
                    require_once("Views/view_expedition.php");
                    break;

                case "valider_expe":
                    $titre = "Expéditions";
                
                    $id = $_POST["id_commande"];
                    echo $id;
                    require_once("Views/view_expedition.php");
                    break;
        
                case "expe_termine":
                    $titre = "Expéditions";
                    
                    break;

                case "expe_tout_voir":
                    $titre = "Expéditions";
                
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
            $mail = $_POST['Mail'];
            
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
            
            $nom = $_POST['Nom'];
            $typ = $_POST['Type'];
            $id = $_POST['id'];
            $prenom = $_POST['Prenom'];
            $mail = $_POST['Mail'];
            
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
<script src="Views/gestion_sav-man.js"></script>
<?php
    require_once("Views/view_footer.php");
?>

