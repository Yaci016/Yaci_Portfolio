<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 10/23/2018 0023
 * Time: 12:35 AM
 */
$pagetitle = "Moderation Commentaire";
require_once '../../../connexion_bdd.php';
//requete sql en include
require_once '../../../requete_Sql.php';
//valider le commentaire qui a etait selectionné
if (isset($_POST['validate'])) {
    validateComment($_POST['validate']);
}
//supprimer le commentaire selectionné
if (isset($_POST['delete'])) {
    deleteComment($_POST['delete']);
}
$Les_Commentaires = showAllValidatedcomments();
//and then call a template:
$tpl = "Moderation_Commentaire.phtml";
include "../../../../layout.php";
