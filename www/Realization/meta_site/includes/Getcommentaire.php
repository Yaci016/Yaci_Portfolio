<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 22/10/18
 * Time: 12:13
 */
// dans un fichier a part les information necessaire a include a rajouter dans toute les pages php
require_once 'connexion_bdd.php';

if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide

    // on récupère les messages ayant un id plus grand que celui donné
    $requete = $bdd->prepare('SELECT Commentaire.*,article.id
                                        FROM Commentaire 
                                        INNER JOIN article ON Commentaire.id_article = article.id
                                        WHERE article.id = ? AND Commentaire.id > ? AND Commentaire.valide = 1 
                                        ORDER BY Commentaire.id DESC LIMIT 0,10');
    $requete->execute(array($_GET['id_article'], $_GET['id']));

    $Les_Commentaires = [];

    // on inscrit tous les nouveaux messages dans une variable
    while ($donnees = $requete->fetch()) {
        $Les_Commentaires[] = $donnees;
    }

    if ($Les_Commentaires != null) {
        foreach ($Les_Commentaires as $donnees) {
            $id = $donnees['id'];
            $pseudo = $donnees['Pseudo'];
            $contenue = $donnees['contenue'];
            $date_ajout = $donnees['date_ajout'];
            ?>

            <p id="<?= $id ?>"><?= $contenue ?> Rédigé par <?= $pseudo ?> le <?= $date_ajout ?></p>
        <?php }
    } else { ?>
        <p><strong>Pas de commentaire encore, soyez le premier a commenter ! </strong></p>
    <?php }
} ?>



