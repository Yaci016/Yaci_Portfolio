<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 23/10/18
 * Time: 09:13
 */
$pagetitle = "Gestion commentaire non validé";
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
$Les_Commentaires = showAllNonValidatedcomments();
//and then call a template:
$tpl = "Validation_Commentaires.phtml";
include "../../../../layout.php";
