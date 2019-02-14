'use strict';

function distanceBetween(point1, point2) {
    return Math.sqrt(Math.pow(point2.x - point1.x, 2) + Math.pow(point2.y - point1.y, 2));
}

function angleBetween(point1, point2) {
    return Math.atan2(point2.x - point1.x, point2.y - point1.y);
}

function drawStar(canvas, context, cx, cy, spikes, outerRadius, innerRadius) {
    var rot = Math.PI / 2 * 3;
    var x = cx;
    var y = cy;
    var step = Math.PI / spikes;

    context.strokeSyle = "#000";
    context.beginPath();
    context.moveTo(cx, cy - outerRadius);
    for (var i = 0; i < spikes; i++) {
        x = cx + Math.cos(rot) * outerRadius;
        y = cy + Math.sin(rot) * outerRadius;
        context.lineTo(x, y);
        rot += step;

        x = cx + Math.cos(rot) * innerRadius;
        y = cy + Math.sin(rot) * innerRadius;
        context.lineTo(x, y);
        rot += step
    }
    context.lineTo(cx, cy - outerRadius);
    context.closePath();
    context.lineWidth = 3;
    context.strokeStyle = 'RED';
    context.stroke();
    context.fillStyle = 'RED';
    context.fill();

}

function croissantDeLune(x, y, linewidth, color, diametre, context) {

    context.lineWidth = linewidth;
    context.fillStyle = color;
    context.beginPath();
    context.arc(x + 30, y + 50, diametre + 8, 0, Math.PI * 2, true);
    context.fill();
    context.globalCompositeOperation = 'destination-out';
    context.beginPath();
    context.arc(x + 40, y + 50, diametre, 0, Math.PI * 2, true);
    context.fill();

}

/*
var degrade = document.querySelector('#degrade');
degrade.addEventListener('click',function(){

    CroissantDeLune(canvas,context);

    var gradient = context.createLinearGradient(0, 0, 500, 0);
    gradient.addColorStop(0,'white');
    gradient.addColorStop(0.5,'white');
    gradient.addColorStop(0.5,'green');
    gradient.addColorStop(1,'green');
    context.globalCompositeOperation = 'destination-over';
    context.fillStyle = gradient;
    context.fillRect(100, 200, 300, 150);
    context.globalCompositeOperation = 'source-over';
    drawStar(canvas,context,250, 280, 5, 20, 10);
});*/
document.addEventListener('DOMContentLoaded', function () {
    var instance = new Program;
});

