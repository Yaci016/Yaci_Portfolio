<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 23/10/18
 * Time: 09:54
 */
$pagetitle = "Espace inscription";
//connexion bdd en include
require_once '../../connexion_bdd.php';
//requete sql en include
require_once '../../requete_Sql.php';
if (isset($_POST['Pseudo'])) {
    $_POST['Pseudo'] = htmlspecialchars($_POST['Pseudo']);
    $_POST['Pass'] = password_hash($_POST['Pass'], PASSWORD_DEFAULT);
    $pseudo = $_POST['Pseudo'];
    $pass = $_POST['Pass'];
    signUp($pseudo, $pass);
}
//and then call a template:
$tpl = "inscription.phtml";
include "../../../layout.php";