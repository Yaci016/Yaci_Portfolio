<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 19/10/18
 * Time: 13:50
 */
session_start();
if (isset($_SESSION['droit']) && $_SESSION['droit'] > 2) {

    $pagetitle = "Edition article";
//connexion bdd en include
    require_once '../../../connexion_bdd.php';
//requete sql en include
    require_once '../../../requete_Sql.php';
//On recupere les auteurs et les categories dans une variable
    $Auteurs = getAuthor();
    $Categories = getCategorie();
//On assigne a nos donnée passer en post des variable pour faciliter la lecture/comprehension
    $titre_A_Edit = $_POST['titre'];
    $contenue_A_Edit = $_POST['contenue'];
    $auteur_A_Edit = $_POST['auteur'];
    $categorie_A_Edit = $_POST['categorie'];
    $article_A_Edit = $_POST['titre'];

//and then call a template:
    $tpl = "Edition_article.phtml";
    include "../../../../layout.php";
} else {
    echo "tes en zone dangereuse bro";
}