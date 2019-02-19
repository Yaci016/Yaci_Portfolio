'use strict';
$(document).ready(function () {
    // When the user scrolls the page, execute myFunction 
    window.onscroll = function () {
        myFunction()
    };

    // Get the navBar
    var header = document.querySelector('header');
    var navBar = document.getElementById("Main_Navigation_bar");
    var element = document.body.querySelectorAll('.Nav_elements');
    // Get the offset position of the navbar
    var sticky = navBar.offsetTop;
    var placeHolder; //variable declaration
    // Create a placeHolder to get rid of the  content jumping to top effect when we change display of nav bar to sticky
    placeHolder = document.createElement('div');
    //set its height equal to the height of nav bar
    var navBarHeight = $("#Main_Navigation_bar").height();
    placeHolder.style.height = navBarHeight + 'px';


    // Add the sticky class to the navBar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.prepend(placeHolder);
            navBar.classList.add("Sticky");
        } else {
            placeHolder.remove();
            navBar.classList.remove("Sticky");
        }
        const SECTION_PRESENTATION = 0;
        const SECTION_COMPETENCE = 459;
        const SECTION_REALISATION = 857;
        const SECTION_CONTACT = 1153;
        var x = window.pageYOffset;
        if (x > SECTION_PRESENTATION && x < SECTION_COMPETENCE) {
            element[1].classList.remove('hover');
            element[0].classList.add('hover');


        } else if (x > SECTION_COMPETENCE && x < SECTION_REALISATION ) {
            element[0].classList.remove('hover');
            element[2].classList.remove('hover');
            element[1].classList.add('hover');

        } else if (x > SECTION_REALISATION  && x < SECTION_CONTACT) {
            element[1].classList.remove('hover');
            element[3].classList.remove('hover');
            element[2].classList.add('hover');
        } else if (x > SECTION_CONTACT) {
            element[2].classList.remove('hover');
            element[3].classList.add('hover');
        }
    }
})