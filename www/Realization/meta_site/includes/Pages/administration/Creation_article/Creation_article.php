<?php

$pagetitle = "Creation Article";
session_start();
if (isset($_SESSION['droit']) && $_SESSION['droit'] > 2) {
//connexion bdd en include
    require_once '../../../connexion_bdd.php';
//requete sql en include
    require_once '../../../requete_Sql.php';
//On recupere les auteurs et les categories dans une variable
    $Auteurs = getAuthor();
    $Categories = getCategorie();
    $tpl = "Creation_article.phtml";
    include "../../../../layout.php";
} else {
    echo "tes en zone dangereuse bro";
}