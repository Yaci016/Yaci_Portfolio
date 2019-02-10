'use strict';  //mode strict de javascript
//function pour afficher les commentaire grace a une requete GET
function charger(){

    setTimeout( function(){

        var premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent
        var id_article = $('button[name="valide"]').val();//on recupere l'id article qui a etait echo dans la value du bouton valide
        $.ajax({ //requete $.ajax qui permet de grandements simplifier la vue de la function apache demandé
            url: "/www/Realization/meta_site/includes/Getcommentaire.php?id="+premierID+"&id_article="+id_article,// on passe l'id le plus récent au fichier de chargement
            type : "GET",
            success: [function (html) {
                $('#messages').html(html);
            }
            ]
        });
        charger();
    }, 5000);
}

//gestionaire d'evenments
document.addEventListener('DOMContentLoaded', function () {

    var ajouter = $('button[name="valide"]');

    ajouter.click(function(e){

        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

        var pseudo = $('input[name="Pseudo"]');

        var message = $('textarea[name="Commentaire"]');

        var ajouterVal = $('button[name="valide"]');

        if(pseudo !== "" && message !== ""){ // on vérifie que les variables ne sont pas vides
            $.ajax({
                url: "/www/Realization/meta_site/includes/addCommentaire.php", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data: "pseudo=" + pseudo.val() + "&message=" + message.val() + "&id=" + ajouterVal.val() // et on envoie nos données (id la en l'occurence veux dire id_article)
            });
            //on reset les valeurs des inputs
            pseudo.val('');
            message.val('');

            $('#Validation').fadeToggle();
            setTimeout(function () {
                $('#Validation').fadeToggle();
            }, 2000);
            charger();
        }
    });
    charger();
});
