<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 23/10/18
 * Time: 09:54
 */
header('location:/MetaSite');
//connexion bdd en include
require_once '../../connexion_bdd.php';
//requete sql en include
require_once '../../requete_Sql.php';
//and then call a template:
if (isset($_POST['Connexion'])) {
    //ids que lutilisateur a rentré
    $pseudo = htmlspecialchars($_POST['Pseudo']);;
    $pass_user = $_POST['Pass'];
    $Les_ids = getId($pseudo);
    var_dump($Les_ids);
    $Pass_bdd = $Les_ids['Pass'];
    $Droit = $Les_ids['Droits'];
    echo '<strong>pass utilisateur sous hash :</strong> ' . $pass_user . ' / <strong>pass bdd sous hash :</strong> ' . $Pass_bdd . '<br>';

    //on check le mot de passe si il est valide on go next
    if (password_verify($pass_user, $Pass_bdd)) {
        echo 'success';
        session_start();
        $_SESSION['user'] = $pseudo;
        $_SESSION['Pass'] = $Pass_bdd;
        $_SESSION['droit'] = $Droit;
    }
}