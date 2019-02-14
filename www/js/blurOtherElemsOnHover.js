'use strict';
//gestionaire d'evenments
/* script qui gere l'effet de flou  */
document.addEventListener('DOMContentLoaded', function () {
    var article = document.querySelectorAll('.white_background_round_border');
    for (var i = 0; i < article.length; i++) {

        article[i].addEventListener('mouseenter', function (e) {
            for (var j = 0; j < article.length; j++) {
                article[j].style.filter = 'blur(10px)';
            }
            e.target.style.filter = 'blur(0px)';
        })
        article[i].addEventListener('mouseleave', function () {
            for (var n = 0; n < article.length; n++) {
                article[n].style.filter = 'blur(0px)';
            }
        })
    }
});