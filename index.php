<?php
date_default_timezone_set('Europe/Paris');
require 'controller/front.php';
session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    //rajouter un switch ici pour les pages du site
    switch ($action) {
        case 'home' : //page d'accueil
            home();
            break;
        case 'error':
            error();
            break;
        default ://si aucun argument n'est rentré pour la variable $_get['action'] on affiche la page d'accueil
            header('location:/home');
            break;
    }
} else { //definit la page principal si aucune page n'est demandé
    header('location:/home');
}