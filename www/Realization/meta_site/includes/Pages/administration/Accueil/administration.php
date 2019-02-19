<?php
session_start();
if (isset($_SESSION['droit']) && $_SESSION['droit'] > 1) {


    $pagetitle = "Page d'administration";
//connexion bdd en include
    require_once '../../../connexion_bdd.php';
//requete sql en include
    require_once '../../../requete_Sql.php';
//rajout d'article si form validé
    if (isset($_POST['valide'])) {
        date_default_timezone_set('Europe/Paris');
        $date_article = date("Y-m-d H:i:s");
        addArticle($_POST['Titre'], $_POST['Article'], $date_article, $_POST['Auteur'], $_POST['Categorie']);
    }
    if (isset($_POST['edit'])) {
        $titre = $_POST['Titre'];
        $contenue = $_POST['Article'];
        $Auteur = $_POST['Auteur'];
        $categorie = $_POST['Categorie'];
        $Article = $_POST['edit'];
        Editerarticle($titre, $contenue, $Auteur, $categorie, $Article);
    }
    if (isset($_POST['AjoutAuteur'])) {
        AddAuteur($_POST['Nom'], $_POST['Prenom']);
    }
    if (isset($_POST['AjoutCategorie'])) {
        addCategorie($_POST['NomCategorie']);
    }
    if (isset($_POST['delete'])) {
        removeArticle($_POST['delete']);
    }
    if (isset($_POST['deleteAuthor'])) {
        RemoveAuthor($_POST['Auteur']);
    }

    if (isset($_POST['deleteCategorie'])) {
        RemoveCategorie($_POST['Categorie']);
    }
//on recupere les articles
    $Liste_News = GetNews();
//and then call a template:
    $tpl = "administration.phtml";
    include "../../../../layout.php";

    $Liste_News = GetNews();
//and then call a template:
    $tpl = "administration.phtml";
    require_once "../../../../layout.php";
} else { ?>
    <p>error 404</p>
<?php } ?>
