<?php
/**
 * Created by PhpStorm.
 * User: Yaci
 * Date: 21/10/2018
 * Time: 16:32
 */
session_start();
if (isset($_SESSION['droit']) && $_SESSION['droit'] > 2) {


    $pagetitle = "Ajout auteur";
    require_once '../../../connexion_bdd.php';
//requete sql en include
    require_once '../../../requete_Sql.php';
//on recupere la liste des auteur pour pouvoir en suprimer un
    $Auteurs = getAuthor();
//and then call a template:
    $tpl = "Ajout_auteur.phtml";
    include "../../../../layout.php";
} else {
    echo "tes en zone dangereuse bro";
}