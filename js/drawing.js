function init() {
    el = document.getElementById('can');
    ctx = el.getContext("2d");
    el.addEventListener("touchstart", handleStart, false);
    el.addEventListener("touchend", handleEnd, false);
    el.addEventListener("touchleave", handleEnd, false);
    el.addEventListener("touchmove", handleMove, false);
}

var coor = "";
var color = "black";
var size = 2;
var el;
var ctx;
var tempX = 0;
var tempY = 0;

function handleStart(evt) {
    evt.preventDefault();
    tempX = evt.changedTouches[0].pageX - el.offsetLeft;
    tempY = evt.changedTouches[0].pageY - el.offsetTop;
    ctx.fillRect(tempX, tempY, size, size);
    ctx.fillStyle = color;
    ctx.fill();
    coor = coor + tempX + " " + tempY + " ";
}

function handleMove(evt) {
    evt.preventDefault();


    for (var i = 0; i < evt.changedTouches.length; i++) {
        ctx.beginPath();
        ctx.moveTo(tempX, tempY);
        tempX = evt.changedTouches[i].pageX;
        tempY = evt.changedTouches[i].pageY;
        ctx.lineTo(tempX, tempY);
        ctx.lineWidth = size;
        ctx.strokeStyle = color;
        ctx.stroke();
        coor = coor + tempX + " " + tempY + " ";
        ctx.closePath();
    }

}

function handleEnd(evt) {
    evt.preventDefault();
    if (coor.length > 1) {
        send();
        coor = "";
    }
}

function send() {
    request.open('post', "pusher.php?coor=" + coor, true);
    request.send(null);
}

function erase() {
    ctx.clearRect(0, 0, el.width, el.height);
    coor = "clear";
    send();
    coor = "";
}

function small(){
    size=2;
    coor = "small";
    send();
    coor = "";
}

function middle(){
    size=4;
    coor = "middle";
    send();
    coor = "";
}

function large(){
    size=6;
    coor = "large";
    send();
    coor = "";
}

//works with mouse
/*var canvas, ctx, flag = false,
 prevX = 0,
 currX = 0,
 prevY = 0,
 currY = 0,
 dot_flag = false;
 
 var x = "black",
 y = 2;
 var text="";
 var object = "gitarre";
 
 function send() {
 request.open('post', "pusher.php?coor=" + text, true);
 request.send(null);
 }
 
 function init() {
 alert("Du musst folgendes Objekt zeichnen: "+object);
 canvas = document.getElementById('can');
 ctx = canvas.getContext("2d");
 w = canvas.width;
 h = canvas.height;
 
 canvas.addEventListener("mousemove", function (e) {
 findxy('move', e)
 }, false);
 canvas.addEventListener("mousedown", function (e) {
 findxy('down', e)
 }, false);
 canvas.addEventListener("mouseup", function (e) {
 findxy('up', e)
 }, false);
 canvas.addEventListener("mouseout", function (e) {
 findxy('out', e)
 }, false);
 }
 
 function draw() {
 ctx.beginPath();
 ctx.moveTo(prevX, prevY);
 ctx.lineTo(currX, currY);
 ctx.strokeStyle = x;
 ctx.lineWidth = y;
 ctx.stroke();
 ctx.closePath();
 text = text + "" + prevX + " " + prevY + " " + currX + " " + currY + " ";
 }
 
 function findxy(res, e) {
 if (res === 'down') {
 prevX = currX;
 prevY = currY;
 currX = e.clientX - canvas.offsetLeft;
 currY = e.clientY - canvas.offsetTop;
 
 flag = true;
 dot_flag = true;
 if (dot_flag) {
 ctx.beginPath();
 ctx.fillStyle = x;
 ctx.fillRect(currX, currY, 2, 2);
 ctx.closePath();
 dot_flag = false;
 }
 }
 if (res === 'up' || res === "out") {
 flag = false;
 if (text.length > 1) {
 send();
 text = "";
 }
 }
 if (res === 'move') {
 if (flag) {
 prevX = currX;
 prevY = currY;
 currX = e.clientX - canvas.offsetLeft;
 currY = e.clientY - canvas.offsetTop;
 draw();
 }
 }
 }
 
 function erase(){
 ctx.clearRect(0,0,canvas.width, canvas.height);
 text="clear";
 send();
 text="";
 }*/