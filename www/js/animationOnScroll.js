'use strict';
var animateHTML = function() {
    var elems;
    var windowHeight;
    function init() {
        elems = document.querySelectorAll('.hidden');
        windowHeight = window.innerHeight;
        addEventHandlers();
        checkPosition();
    }
    function addEventHandlers() {
        window.addEventListener('scroll', checkPosition);
        window.addEventListener('resize', init);
    }
    function checkPosition() {
        for (var i = 0; i < elems.length; i++) {
            var positionFromTop = elems[i].getBoundingClientRect().top;
            if (positionFromTop - windowHeight <= 0) {
                if (i % 2 === 0) {
                    elems[i].className = elems[i].className.replace(
                        'hidden',
                        'left-to-right'
                    );
                } else {
                    elems[i].className = elems[i].className.replace(
                        'hidden',
                        'right-to-left'
                    );
                }
            }
        }
    }
    return {
        init: init
    };
};
animateHTML().init();