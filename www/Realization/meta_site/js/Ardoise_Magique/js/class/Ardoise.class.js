//TODO
function Ardoise(pen) {
    this.canvas = document.querySelector("#content");
    this.context = this.canvas.getContext("2d");
    this.desseinOn = false;
    this.points = [];
    this.lastPoint = "";
    this.currentPoint = "";
    this.currentLocation = null;
    this.pen = pen;
    this.effect = "pencil";
    this.shadow = false;
    this.canvas.addEventListener('mousedown', this.onMouseDown.bind(this));
    this.canvas.addEventListener('mouseleave', this.onMouseLeave.bind(this));
    this.canvas.addEventListener('mouseup', this.onMouseUp.bind(this));
    this.canvas.addEventListener('mousemove', this.onMouseMove.bind(this));
}

Ardoise.prototype.care = function (x, y, width, height, color, context) {
    context.beginPath();
    context.rect(x, y, width, height);
    context.fillStyle = color;
    context.fill();
    context.closePath();
};

Ardoise.prototype.effacer = function () {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height)
};
Ardoise.prototype.getMouseLocation = function (evt) {
    var bords = this.canvas.getBoundingClientRect();
    var x = evt.clientX - bords.left;
    var y = evt.clientY - bords.top;
    return {x: x, y: y};

};
Ardoise.prototype.onMouseDown = function (evt) {
    switch (this.effect) {
        case 'toile' :
            this.desseinOn = true;
            this.currentLocation = this.points.push(this.getMouseLocation(evt));
            break;
        case 'pencil':
            this.desseinOn = true;
            this.currentLocation = this.getMouseLocation(evt);
            break;
        case 'brush':
            this.desseinOn = true;
            this.lastPoint = this.getMouseLocation(evt);
            break;
        case 'rectangle':
            this.desseinOn = true;
            this.currentLocation = this.getMouseLocation(evt);

    }
};
Ardoise.prototype.onMouseMove = function (evt) {
    var location = this.getMouseLocation(evt);
    if (this.desseinOn) {
        switch (this.effect) {
            case 'toile':

                this.points.push(location);
                this.context.strokeStyle = this.pen.color;
                this.context.lineWidth = this.pen.size;
                this.context.lineJoin = this.context.lineCap = 'round';
                if (this.shadow) {
                    this.context.shadowBlur = 10;
                    this.context.shadowColor = 'rgb(0, 0, 0)';
                } else {
                    this.context.shadowBlur = 0;
                    this.context.shadowColor = '';
                }
                this.context.beginPath();
                this.context.moveTo(this.points[0].x, this.points[0].y);
                for (var i = 1; i < this.points.length; i++) {
                    this.context.lineTo(this.points[i].x, this.points[i].y);
                }
                this.context.closePath();
                this.context.stroke();


                break;
            case 'pencil' :


                //rajouter un switch ici selon qu'elle bouton l'utilisateur a clické dessus pen / brush / crayon
                this.context.strokeStyle = this.pen.color;
                this.context.lineWidth = this.pen.size;
                this.context.lineJoin = this.context.lineCap = 'round';
                if (this.shadow) {
                    this.context.shadowBlur = 10;
                    this.context.shadowColor = 'rgb(0, 0, 0)';
                } else {
                    this.context.shadowBlur = 0;
                    this.context.shadowColor = '';
                }
                this.context.beginPath();
                this.context.moveTo(this.currentLocation.x, this.currentLocation.y);
                this.context.lineTo(location.x, location.y);
                this.context.closePath();
                this.context.stroke();


                break;

            case 'brush':
                var img = new Image();
                img.src = 'http://www.tricedesigns.com/wp-content/uploads/2012/01/brush2.png';
                this.currentPoint = location;
                var dist = distanceBetween(this.lastPoint, this.currentPoint);
                var angle = angleBetween(this.lastPoint, this.currentPoint);
                for (var i = 0; i < dist; i++) {
                    x = this.lastPoint.x + (Math.sin(angle) * i) - 25;
                    y = this.lastPoint.y + (Math.cos(angle) * i) - 25;
                    this.context.drawImage(img, x, y);
                }
                this.lastPoint = this.currentPoint;
                break;

            case 'rectangle':


                if (this.shadow) {
                    this.context.shadowBlur = 10;
                    this.context.shadowColor = 'rgb(0, 0, 0)';
                } else {
                    this.context.shadowBlur = 0;
                    this.context.shadowColor = '';
                }
                this.care(this.currentLocation.x, this.currentLocation.y, this.pen.size, 40, this.pen.color, this.context);
                break;
        }
        this.currentLocation = location;
    }

};
Ardoise.prototype.onMouseLeave = function () {
    this.desseinOn = false;
    this.points.length = 0;
};
Ardoise.prototype.onMouseUp = function () {
    this.desseinOn = false;
    this.points.length = 0;
};


