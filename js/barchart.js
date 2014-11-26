/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function draw() {
    var canvas = document.getElementById('bar-chart');

    if(canvas && canvas.getContext) {
        var ctx = canvas.getContext('2d');

        if(ctx) {
            ctx.fillStyle(130, 130, 130);
            ctx.fillRect(50, 25, 100, 150); // x, y, w, h
        }
    }
}

window.onload = draw;




