var canvas;

function init(){
canvas = document.getElementById('canvas');
canvas.width = screen.width*0.45;
canvas.height = canvas.width;
//countdown();
}


function countdown (i) {
  if (i == undefined) {
    // Startwert
    i = 60;
  }
  document.countdownform.countdowninput.value =
          "noch "+i+" Sekunden";
  if (i > 0) {
    i--;
    // Funktion verzögert aufrufen
    window.setTimeout("countdown(" + i + ")", 1000);
  }
  else
      end();
}

function end(){
    alert("Die Zeit ist abgelaufen");
}

