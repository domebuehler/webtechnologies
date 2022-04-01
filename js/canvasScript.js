function draw() {
    let canvas = document.getElementById('myCanvas');
    let c = canvas.getContext('2d');

    c.fillStyle = "green";
    c.beginPath();
    c.moveTo(16, 16);
    c.lineTo(16, 300);
    c.lineTo(300,16);
    c.fill();
    c.closePath();

    c.fillStyle = "red";
    c.beginPath();
    c.moveTo(300,16);
    c.lineTo(300,300);
    c.lineTo(16,300);
    c.fill();
    c.closePath();

    c.strokeStyle = "blue";
    c.lineWidth = 5;
    c.strokeRect(16,16,284,284);
}
draw();