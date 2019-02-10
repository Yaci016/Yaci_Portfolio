'use strict';
document.addEventListener('DOMContentLoaded',function(){
var boutonConnexion = document.querySelector('#Connexion');
var sectionConnexion = document.querySelector('#section_connexion');
    if (boutonConnexion) {
        boutonConnexion.addEventListener('click', function (e) {
            sectionConnexion.style.display = "block";
            boutonConnexion.style.display = "none";
            e.preventDefault();
        })
    }
});