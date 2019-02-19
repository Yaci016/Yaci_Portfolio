<?php
/**
 * Created by PhpStorm.
 * User: Yaci
 * Date: 21/10/2018
 * Time: 16:33
 */
session_start();
if (isset($_SESSION['droit']) && $_SESSION['droit'] > 2) {
    $pagetitle = "Ajout Categorie";
    require_once '../../../connexion_bdd.php';
//requete sql en include
    require_once '../../../requete_Sql.php';
//Ajout de categorie
    $Categories = getCategorie();
//and then call a template:
    $tpl = "Ajout_categorie.phtml";
    include "../../../../layout.php";
} else {
    echo "tes en zone dangereuse bro";
}