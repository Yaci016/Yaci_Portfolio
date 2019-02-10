'use strict';
$(document).ready(function () {
    // When the user scrolls the page, execute myFunction 
    window.onscroll = function () { myFunction() };

    // Get the navBar
    var header = document.querySelector('header');
    var navBar = document.getElementById("Main_Navigation_bar");
    // Get the offset position of the navbar
    var sticky = navBar.offsetTop;
    var placeHolder; //variable declaration
    // Create a placeHolder to get rid of the  content jumping to top effect when we change display of nav bar to sticky
    placeHolder = document.createElement('div');
    //set its height equal to the height of nav bar
    var navBarHeight = $("#Main_Navigation_bar").height();
    placeHolder.style.height = navBarHeight +'px';
    // Add the sticky class to the navBar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.prepend(placeHolder);
            navBar.classList.add("Sticky");
        } else {
            placeHolder.remove();
            navBar.classList.remove("Sticky");
        }
    }
})