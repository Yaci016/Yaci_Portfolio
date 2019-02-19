<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 10/22/2018 0022
 * Time: 1:26 AM
 */
require_once  'connexion_bdd.php';
require_once 'requete_Sql.php';

if (isset($_POST['id'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $contenue = htmlspecialchars($_POST['message']);
    $id_article = htmlspecialchars($_POST['id']);
    date_default_timezone_set('Europe/Paris');
    $date_du_commentaire = date("Y-m-d H:i:s");
    InsertComment($pseudo,$contenue,$date_du_commentaire,$id_article);
}
