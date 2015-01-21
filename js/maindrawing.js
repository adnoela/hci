var canvas;
var duration = 60;

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

        } else {
            counter = counter - x;
            bar.style.width = counter + "%";
            bar.style.background = "#6B8E23";
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
        btn[i].style.opacity = "0.3";
    }
    btn = document.getElementById('btn' + answer);
    btn.style.background = '#228B22';
    btn.style.opacity = "1.0";
    
    var end = document.getElementById('end');
    endmsg.style.fontsize = "50em";
    end.style.background = '#F5F5DC';
    endmsg.style.fontSize = "3em";
    endmsg.innerHTML = "Die Zeit ist abgelaufen! Gratulation an den/die ZeichnerIn, "+count+" Personen haben die Zeichnung erkannt. \n\
        Falls jemand der Meinung ist, er könne das besser: <br> Einfach das nächste Quiz gewinnen und selber probieren!";

    end.style.visibility = "visible";
    request.open('post', "pusherEnd.php", true);
    request.send(null);
    endtimer(10);
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

