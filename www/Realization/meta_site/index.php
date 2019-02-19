<?php
session_start();
$pagetitle = "index du blog";
//connexion bdd en include
require_once 'includes/connexion_bdd.php';
//requete sql en include
require_once 'includes/requete_Sql.php';
$Liste_News = GetNews();
//si une personne s'inscrit
if (isset($_POST['Inscription'])) {
    $pseudo = htmlspecialchars($_POST['Pseudo']);;
    $pass = password_hash($_POST['Pass'], PASSWORD_DEFAULT);;
    $inscription = signUp($pseudo, $pass);
    if ($inscription) {
        echo 'inscription reussi';
    } else {
        echo 'pseudo utilisé';
    }
}
//and then call a template:
$tpl = "index.phtml";
include "layout.php";
