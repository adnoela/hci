var canvas;

function init(){
canvas = document.getElementById('canvas');
canvas.width = screen.width*0.42;
canvas.height = canvas.width;

}


function countdown (i) {
  if (i == undefined) {
    // Startwert
    i = 60;
  }
  document.countdownform.countdown.value =
          "Verbleibende Zeit: "+i+" Sekunden";
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

