<?php
require 'model/front/modele.php';
function home()
{
    require_once 'www/view/home/homeView.phtml';
}
function contact($post){
    //==========
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    //==========
    $mail = "yacinekherbache@yaci.fr";
    //==========
    $nom = htmlentities(strval($post["Nom"]));
    $objet = htmlentities( strval($post['Objet']));
    $Contenue = htmlentities(wordwrap($post['Message'], 65, "<br />\n"));
    //==========

    $boundary = "-----=".md5(rand());

    //==========

    $header = "From: \"$nom\"<yacifrzgfc@cluster026.hosting.ovh.net>".$passage_ligne;
    $header.= "Reply-to: \"RETOUR\" <ADRESSE_RETOUR>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========

    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message .= "Content-Type: text/html; charset=\"iso-8859-1\"".$passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$Contenue.$passage_ligne;
    //==========

    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========

    mail($mail,$objet,$message,$header);
    //==========
    $_SESSION["Email"] = true;
    header('location:home');
}