'use strict';

function Program() {
    this.pen = new Pen;
    this.palette = new Palette;
    this.ardoise = new Ardoise(this.pen);
    this.start();
}

Program.prototype.afficherPalette = function () {
    if (this.palette.canvas.style.display === "inline-block") {
        this.palette.canvas.style.display = "none";
    } else {
        this.palette.canvas.style.display = "inline-block";
    }
};

Program.prototype.start = function () {
    //Event listeners

//afficher le palette quand on click sur  la pipette
    var pipette = document.querySelector('#pipette');
    pipette.addEventListener('click', function () {
        this.afficherPalette();
    }.bind(this));
//change l'epaisseur quand on bouge la range de l'input epaisseur
    var epaisseur = document.querySelector('p input[type="range"]');
    var sortie = document.querySelector('#output');
    epaisseur.onchange = function () {
        sortie.style.width = epaisseur.value + "px";
        this.pen.setSize(epaisseur.value);
    }.bind(this);
    var divsColo = document.querySelectorAll('#Couleurs>div');
    var selectedColo = null;

//rajout d'un event listerner a toutes les div ronde pour changer la couleur du stylo
    for (var i = 0; i < divsColo.length; i++) {
        divsColo[i].addEventListener('click', function (e) {
            var colo = e.target.dataset.colo;
            this.pen.setColor(colo);
            var coloSelected = document.querySelector('#colo_selected');
            coloSelected.style.background = colo;
            if (selectedColo) {
                selectedColo.classList.remove('selected');
            }
            e.target.classList.add('selected');
            selectedColo = e.target;
        }.bind(this));
    }


    Program.prototype.onPickColor = function () {
        this.afficherPalette();
        var color = this.palette.pickedColor;
        this.pen.setColorFromPalette(this.palette.getColor());
        var coloSelected = document.querySelector('#colo_selected');
        coloSelected.style.background = color;
        if (selectedColo) {
            selectedColo.classList.remove('selected');
        }
    };
    document.addEventListener('Click palette', this.onPickColor.bind(this));


    var eraser = document.querySelector('#eraser');
    eraser.addEventListener('click', this.ardoise.effacer.bind(this.ardoise));


    var gomme = document.querySelector('#Gomme');
    gomme.addEventListener('click', function () {
        this.pen.setColor('white');
        var coloSelected = document.querySelector('#colo_selected');
        coloSelected.style.background = 'white';
    }.bind(this));

    var effect = document.querySelector("#effects");
    effect.addEventListener('change', function (e) {
        this.ardoise.effect = e.target.value;
        console.log(this.ardoise.effect);
    }.bind(this));

    var shadow = document.querySelector('#shadow');
    shadow.addEventListener('change', function (e) {

        if (e.target.checked === true) {
            this.ardoise.shadow = true;
        } else {
            this.ardoise.shadow = false;
        }
        console.log(this.ardoise.shadow);
    }.bind(this))
};


