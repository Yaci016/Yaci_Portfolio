'use strict';

function Palette() {
    this.canvas = document.querySelector('#palette');
    this.context = this.canvas.getContext('2d');
    this.pickedColor = "";
    this.build();
    this.canvas.addEventListener("click", this.onclick.bind(this));

}

//Methode pour recuprer
Palette.prototype.onclick = function (event) {
    var dessein = this.canvas.getBoundingClientRect();
    this.x = event.clientX - dessein.left;
    this.y = event.clientY - dessein.top;
    var maCouleur = this.context.getImageData(this.x, this.y, 1, 1);
    this.pickedColor = "rgb(" + maCouleur.data[0] + "," + maCouleur.data[1] + "," + maCouleur.data[2] + ")";
    //on crée un event custom "click palette" et on le dispatch et on ajoute un event listener dans program.start pour ce custom event
    var customEvenement = new Event('Click palette');
    document.dispatchEvent(customEvenement);
};
Palette.prototype.build = function () {
    //gauche a droite gradient
    var grd0 = this.context.createLinearGradient(0, 0, this.canvas.width, 0);
    grd0.addColorStop(0, 'rgb(255,0,0)');
    grd0.addColorStop(0.15, 'rgb(255,0,255)');
    grd0.addColorStop(0.32, 'rgb(0,0,255)');
    grd0.addColorStop(0.49, 'rgb(0,255,255)');
    grd0.addColorStop(0.66, 'rgb(0,255,0)');
    grd0.addColorStop(0.83, 'rgb(255,255,0)');
    grd0.addColorStop(1, 'rgb(255,0,0)');
    this.context.fillStyle = grd0;
    this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
    //haut a bas gradient
    var grd = this.context.createLinearGradient(0, 0, 0, this.canvas.height);
    grd.addColorStop(0, 'rgba(0,0,0,1)');
    grd.addColorStop(0.5, 'rgba(0,0,0,0)');
    grd.addColorStop(0.5, 'rgba(255,255,255,0)');
    grd.addColorStop(1, 'rgba(255,255,255,1)');
    this.context.fillStyle = grd;
    this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
};
Palette.prototype.getColor = function () {
    return this.pickedColor;
};
