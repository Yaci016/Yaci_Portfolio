<?php
//Index
function GetNews()
{
    global $bdd;

    $getNews = "SELECT article.id,article.titre, article.contenue,article.date_ajout,Auteur.Nom,Auteur.Prenom,categorie.Nom_De_Categorie\n"
        . " FROM `article` \n"
        . " LEFT JOIN Auteur ON article.id_auteur = Auteur.id\n"
        . " LEFT JOIN categorie ON article.id_categorie = categorie.id\n"
        . " ORDER BY date_ajout DESC";
    $Liste_news = array();

    $reponseIndex = $bdd->prepare($getNews);
    $reponseIndex->execute();
    while ($donnees = $reponseIndex->fetch()) {
        $Liste_news[] = $donnees;
    };
    return $Liste_news;
}
//Commentaire
function GetNew($id)
{
    global $bdd;
    $getSpecifiedNews = "SELECT article.id,article.titre, article.contenue,article.date_ajout,Auteur.Nom,Auteur.Prenom,categorie.Nom_De_Categorie\n"

        . "FROM `article` \n"

        . "LEFT JOIN Auteur ON article.id_auteur = Auteur.id\n"

        . "LEFT JOIN categorie ON article.id_categorie = categorie.id\n"

        . "WHERE article.id = ?\n"

        . "ORDER BY date_ajout DESC\n";
    $La_New = [];
    $reponse_commentaire1 = $bdd->prepare($getSpecifiedNews);
    $reponse_commentaire1->execute(array($id));
    while ($donnees = $reponse_commentaire1->fetch()) {
        $La_New[] = $donnees;
    }
    return $La_New;
}

function showComments($id)
{
    global $bdd;
    $Show_Comments_Of_Selected_Article = "SELECT Commentaire.*,article.id FROM Commentaire INNER JOIN article ON Commentaire.id_article = article.id WHERE article.id = ? AND Commentaire.valide = 1 ORDER BY Commentaire.id DESC LIMIT 0,10";

    $Les_Commentaires = [];
    $reponse_commentaire2 = $bdd->prepare($Show_Comments_Of_Selected_Article);
    $reponse_commentaire2->execute(array($id));
    while ($donnees = $reponse_commentaire2->fetch()) {
        $Les_Commentaires[] = $donnees;
    }
    return $Les_Commentaires;

}


function InsertComment($Pseudo, $contenue, $date, $id_article)
{
    global $bdd;
    $reponse_commentaire3 = $bdd->prepare("INSERT INTO `Commentaire` (`Pseudo`, `contenue`, `date_ajout`, `id_article`) VALUES (?, ?, ?, ?)");
    $reponse_commentaire3->execute(array($Pseudo, $contenue, $date, $id_article));
}
function getAuthor() {
    global $bdd;
    $Get_auteur = "SELECT * FROM `Auteur` \n"
        . "ORDER BY `Auteur`.`Nom` ASC";
    $Les_Auteurs = [];
    $reponse_GetAuteur = $bdd->prepare($Get_auteur);
    $reponse_GetAuteur->execute();
    while ($donnees = $reponse_GetAuteur->fetch()) {
        $Les_Auteurs[] = $donnees;
    }
    return $Les_Auteurs;
}
function getCategorie() {
    global $bdd;
    $Get_Categorie = "SELECT * FROM `categorie` \n"
        . "ORDER BY `categorie`.`Nom_De_Categorie` ASC";
    $Les_Categorie = [];
    $reponse_Categorie = $bdd->prepare($Get_Categorie);
    $reponse_Categorie->execute();
    while ($donnees = $reponse_Categorie->fetch()) {
        $Les_Categorie[] = $donnees;
    }
    return $Les_Categorie;

}

function addArticle($titre,$contenue,$date_ajout,$id_auteur,$id_categorie){
    global $bdd;
    $add_Article = $bdd ->prepare("INSERT INTO `article` ( `titre`, `contenue`, `date_ajout`, `id_auteur`, `id_categorie`) VALUES ( ?, ?, ?, ?, ?)");
    $add_Article -> execute(array($titre,$contenue,$date_ajout,$id_auteur,$id_categorie));

}

function removeArticle($id){
    global $bdd;
    $remove_selected_article = $bdd ->prepare("DELETE FROM `article` WHERE `article`.`id` = ?");
    $remove_selected_article-> execute(array($id));
    $remove_comments_selected_article = $bdd->prepare("DELETE FROM Commentaire WHERE Commentaire.id_article = ?");
    $remove_comments_selected_article->execute(array($id));

}
function Editerarticle($titre,$contenue,$auteur,$categorie,$article){
    global $bdd;
    $edit_article = $bdd -> prepare("UPDATE `article` SET `titre` =  ?, `contenue` =  ?, `id_auteur` =  ?, `id_categorie` = ? WHERE `article`.`id` = ?");
    $edit_article-> execute(array($titre,$contenue,$auteur,$categorie,$article));
}

function AddAuteur($nom,$prenom){
    global $bdd;
    $AddAuteur = $bdd ->prepare("INSERT INTO `Auteur` ( `Nom`, `Prenom`) VALUES ( ?, ?)");
    $AddAuteur -> execute(array($nom,$prenom));
}
function addCategorie($Nom_categorie){
    global $bdd;
    $addCategorie = $bdd ->prepare("INSERT INTO `categorie` ( `Nom_De_Categorie`) VALUES ( ?)");
    $addCategorie -> execute(array($Nom_categorie));
}
function RemoveAuthor($id){
    global $bdd;
    $remove_selected_article = $bdd ->prepare("DELETE FROM `Auteur` WHERE `Auteur`.`id` = ?");
    $remove_selected_article-> execute(array($id));
}
function RemoveCategorie($id){
    global $bdd;
    $remove_selected_article = $bdd ->prepare("DELETE FROM `categorie` WHERE `categorie`.`id` = ?");
    $remove_selected_article-> execute(array($id));
}

function showAllValidatedcomments()
{
    global $bdd;
    $Show_Comments_Of_Selected_Article = "SELECT * FROM Commentaire WHERE Commentaire.Valide = 1 ORDER BY Commentaire.id   ";
    $Les_Commentaires = [];
    $reponse_bdd_Moderation_commentaire = $bdd->prepare($Show_Comments_Of_Selected_Article);
    $reponse_bdd_Moderation_commentaire->execute();
    while ($donnees = $reponse_bdd_Moderation_commentaire->fetch()) {
        $Les_Commentaires[] = $donnees;
    }
    return $Les_Commentaires;
}

function showAllNonValidatedcomments()
{
    global $bdd;
    $Show_Comments_Of_Selected_Article = "SELECT * FROM Commentaire WHERE Commentaire.Valide = 0 ORDER BY Commentaire.id   ";
    $Les_Commentaires = [];
    $reponse_bdd_Moderation_commentaire = $bdd->prepare($Show_Comments_Of_Selected_Article);
    $reponse_bdd_Moderation_commentaire->execute();
    while ($donnees = $reponse_bdd_Moderation_commentaire->fetch()) {
        $Les_Commentaires[] = $donnees;
    }
    return $Les_Commentaires;
}
function validateComment($id)
{

    global $bdd;
    $validate_comment = $bdd->prepare("UPDATE Commentaire SET Valide = 1 WHERE Commentaire.id = ?");
    $validate_comment->execute(array($id));
}

function deleteComment($id)
{
    global $bdd;
    $validate_comment = $bdd->prepare("DELETE FROM Commentaire WHERE Commentaire.id = ?");
    $validate_comment->execute(array($id));
}

function signUp($Pseudo, $Pass)
{

    global $bdd;
    //on recherche dans la table users si le  pseudo existe deja
    $verificationPseudo = "SELECT * FROM users WHERE Pseudo = ?";
    $checkPseudoInBdd = $bdd->prepare($verificationPseudo);
    $checkPseudoInBdd->execute(array($Pseudo));
    $count = $checkPseudoInBdd->rowCount();
    if ($count != 0) {
        return false;//fail inscription
    } else {
        $InsererDansBdd = "INSERT INTO users ( Pseudo, Pass) VALUES (?, ?)";
        $signUp = $bdd->prepare($InsererDansBdd);
        $signUp->execute(array($Pseudo, $Pass));
        return true;//inscription reussi
    }

}

function signIn($Pseudo, $Pass)
{
    global $bdd;
    //on recherche dans la table users le pseudo et pass et voir si ca match avec ce que l'utilisateur a rentré
    $verification_Pseudo_mdp = "SELECT * FROM users WHERE Pseudo = ? ";
    $checkLoginInBdd = $bdd->prepare($verification_Pseudo_mdp);
    $checkLoginInBdd->execute(array($Pseudo));
    $count = $checkLoginInBdd->rowCount();
    if ($count != 0) {
        return false;//fail inscription
    } else {
        $Les_ids = getId($Pseudo);
        $pseudo = $Les_ids['Pseudo'];
        $Pass_bdd = $Les_ids['Pass'];
        $Droit = $Les_ids['Droits'];
        $pass_user = password_hash($Pass, PASSWORD_DEFAULT);
        //on check le mot de passe si il est valide on go next
        if ($Pass_bdd == $pass_user) {
            $_SESSION['user'] = $pseudo;
            $_SESSION['Pass'] = $Pass_bdd;
            $_SESSION['droit'] = $Droit;
        }
    }
}

function getId($Pseudo)
{
    global $bdd;
    $verification_Pseudo_mdp = "SELECT id,Pseudo,Pass,Droits FROM users WHERE Pseudo = ?";
    $get_Ids_In_BDD = $bdd->prepare($verification_Pseudo_mdp);
    $get_Ids_In_BDD->execute(array($Pseudo));
    $donnees = $get_Ids_In_BDD->fetch();
    return $donnees;
}

function signOff()
{
    session_start();
    session_destroy();
}