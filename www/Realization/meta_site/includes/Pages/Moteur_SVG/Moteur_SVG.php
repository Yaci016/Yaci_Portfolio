<?php

if (!isset($_SESSION)){
    session_start();
}
$pagetitle = "Dessin_Svg";

//connexion bdd en include
require_once '../../connexion_bdd.php';
//requete sql en include
require_once '../../requete_Sql.php';

//class necessaire au dessin en svg
require_once("class/point.class.php");
require_once("class/shape.class.php");
require_once("class/rectangle.class.php");
require_once("class/caree.class.php");
require_once("class/elipse.class.php");
require_once("class/cercle.class.php");
require_once("class/triangle.class.php");
require_once("class/point.class.php");
require_once("class/moteur.class.php");
require_once("class/program.class.php");

$index = new program(new Moteur);

if (isset($_POST['valide'])) {
    $index->dessinerForme($_POST['FormePJs']);
}

if (isset($_POST['reset'])) {
    $_SESSION['results'] = [];
}

if (!isset($_SESSION['results'])) {
    $_SESSION['results'] = [];
}
//code ici


//and then call a template:
$tpl = "Moteur_SVG.phtml";
include "../../../layout.php";