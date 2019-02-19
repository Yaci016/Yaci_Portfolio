<?php
$id_article = $_GET['article'];
$pagetitle = "Commentaires de la news";
//connexion bdd en include
require_once '../../connexion_bdd.php';
//requete sql en include
require_once '../../requete_Sql.php';
//Variable contenant le resultat de la requete sql get new
$La_new = GetNew($id_article);
if ($La_new != null) {
    $id = $La_new[0]['id'];
    $titre = $La_new[0]['titre'];
    $contenue = $La_new[0]['contenue'];
    $date_ajout = $La_new[0]['date_ajout'];
    $nom_Auteur = $La_new[0]['Nom'];
    $Prenom_Auteur = $La_new[0]['Prenom'];
    $categorie = $La_new[0]['Nom_De_Categorie'];
}
// Condition si formulaire valide on rajoute un commentaire
if (isset($_POST['valide'])) {
    $pseudo = htmlspecialchars($_POST['Pseudo']);
    $contenue = htmlspecialchars($_POST['Commentaire']);
    date_default_timezone_set('Europe/Paris');
    $date_du_commentaire = date("Y-m-d H:i:s");
    InsertComment($pseudo, $contenue, $date_du_commentaire, $id_article);
}
//Variable contenant le resultat de la requete sql ShowComments
$Les_Commentaires = showComments($id_article);

//and then call a template:
$tpl = "commentaires.phtml";
include "../../../layout.php";
