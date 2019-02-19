'use strict';
function Pen(){
this.color = "black";
this.size = "5";
    this.type = "brush";
}

Pen.prototype.setType = function (type) {
    this.type = type;
};

Pen.prototype.setColor= function(color){
this.color = color;
};
Pen.prototype.setColorFromPalette = function(color){
this.color = color;
};
Pen.prototype.setSize = function(size){
this.size = size;
};
/*Ardoise.prototype.getMouseLocation = function (evt) {
    var bords = this.canvas.getBoundingClientRect();
    var x = evt.clientX - bords.left;
    var y = evt.clientY - bords.top;
    return {x: x, y: y};
};

Ardoise.prototype.onMouseDown = function (evt) {
    this.desseinOn = true;
    this.currentLocation = this.getMouseLocation(evt);
};


Ardoise.prototype.onMouseMove = function (evt) {
    var location = this.getMouseLocation(evt);
if (this.desseinOn){
    //rajouter un switch ici selon qu'elle bouton l'utilisateur a clické dessus pen / brush / crayon
    this.context.strokeStyle = this.pen.color;
    this.context.lineWidth = this.pen.size;
    this.context.lineJoin = this.context.lineCap = 'round';
    this.context.beginPath();
    this.context.moveTo(this.currentLocation.x, this.currentLocation.y);
    this.context.lineTo(location.x, location.y);

    this.context.closePath();
    this.context.stroke();
}
    this.currentLocation = location;
};

Ardoise.prototype.onMouseLeave = function () {
    this.desseinOn = false;
};

Ardoise.prototype.onMouseUp = function () {
    this.desseinOn = false;

};
*/
