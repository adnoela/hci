var canvas;
var duration = 5;

function init() {
    canvas = document.getElementById('canvas');
    canvas.width = screen.width * 0.4;
    canvas.height = canvas.width;
    setQandA();
    countdown(duration);
    bar();
}

var startTime = new Date().getTime();
var seconds = duration;
var endTime = startTime + seconds * 1000;

var max = 100;
var counter = max;
var interval = 100;
var x = max / seconds * (interval / 1000);

function bar() {
    var bar = document.getElementById("pbarTimer");
    var cint = setInterval(function () {
        if (counter - x < 0 || (new Date().getTime() >= endTime)) {
            bar.style.width = 0;

            showRightAnswer();
            if (nOfQuizzes === 2)
            {
                quizEndMsg(winnerID);
                window.setTimeout(function () {
                    window.location.href = document.getElementById("analysisLink").getAttribute("href");
                }, 3000);
                clearInterval(cint);
            }
            else
            {
                quizEndMsg("reload");
                window.setTimeout(function () {
                    location.reload();
                }, 3000);
                clearInterval(cint);
            }
        } else {
            counter = counter - x;
            bar.style.width = counter + "%";
            bar.style.backgroundColor = "black";
        }
   
    
    }, interval)
}

function countdown(i) {
    if (i == undefined) {
        // Startwert
        i = 120;
    }
    document.countdownform.countdown.value =
            "Verbleibende Zeit: " + i + " Sekunden";
    if (i > 0) {
        i--;
        // Funktion verzögert aufrufen
        window.setTimeout("countdown(" + i + ")", 1000);
    }
    else {
        end();
    }
}

var btn;
function end() {
    btn = document.getElementsByClassName('btn-xl');
    for (var i = 0; i < btn.length; i++) {
        btn[i].disabled = "true";
        btn[i].style.background = '#696969';
    }
    document.getElementById('btn' + answer).style.background = '#228B22';
    var end = document.getElementById('end');
    end.style.fontsize = "50em";
    if (count > 0) {
        end.style.background = '#228B22';
        end.style.fontSize = "4em";
        end.innerHTML = "Glückwunsch an den/die ZeichnerIn, es haben genügend Leute ihre Zeichnung erkannt! <br> Nächste Runde in 5 Minuten";
    }
    else {
        end.style.background = '#FF0000';
        end.style.fontSize = "3em";
        end.innerHTML = "Tut mir leid, zu wenig Leute haben die Zeichnung erkannt. Der/Die MalerIn sollte eventuell das Hobby wechseln! <br> Nächste Runde in 5 Minuten";
    }
    end.style.visibility = "visible";
    request.open('post', "pusherEnd.php", true);
    request.send(null);
    endtimer(5);
}

function endtimer(i) {
    if (i == undefined) {
        // Startwert
        i = 10;
    }

    if (i > 0) {
        i--;
        // Funktion verzögert aufrufen
        window.setTimeout("endtimer(" + i + ")", 1000);
    }
    else
    {
        document.location.href = "quizscreen.php";
    }
}

