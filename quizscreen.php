<?php
session_start();

$quiz = file_get_contents("quizstatus.txt");

$drawinground = 0;
$filename = "drawingstatus.txt";
if (file_exists($filename)) {
    $drawinground = file_get_contents($filename);
    if ($drawinground == 0) {
        file_put_contents($filename, 1);
    }
    if ($drawinground == 1) {
        file_put_contents($filename, 2);
    }
    if ($drawinground == 2) {
        file_put_contents($filename, 0);
    }
} else {
    file_put_contents($filename, 0);
}

/*$counter = 1;
$filename = "counter.txt";
if (file_exists($filename)) {
    $counter = file_get_contents($filename);
    if ($counter == 1) {
        file_put_contents($filename, 2);
    }
    if ($counter == 2) {
        file_put_contents($filename, 1);
    }
} else {
    file_put_contents($filename, '1');
}
 */
?>

<html>
    <head>
        <title>Quiz</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">


        <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
        <script type="text/javascript">

            //var nOfQuizzes = ?php echo $counter; ?>;

            var qaNumber = <?php echo substr($quiz, -1); ?>;
            var questions = [
                "Wann ist der vierte Advent?",
                "Wo wurde Jesus geboren?",
                "Wie lange haben die Christkindlmärkte offen?",
                "Welche Aussage über den Schneemann ist falsch?",
                "Was ist kein Wintermarkt-Getränk?",
                "Wie heißen nach einem alten Brauch am 4. Dez geschnittene Zweige?"
            ];
            var answers = new Array(6);
            answers[0] = [
                "A",
                "Sonntag vor Weihnachten",
                "Am 24. Dezember",
                "Viete Samstag im Dezember",
                "Vierte Sonntag im Dezember"
            ];
            answers[1] = [
                "B",
                "Jerusalem",
                "Bethlehem",
                "Nazareth",
                "Jericho"
            ];
            answers[2] = [
                "A",
                "Bis zum 24. Dezember",
                "Bis Silvester",
                "Bis zum 4. Advent",
                "Bis Ende Jänner"
            ];
            answers[3] = [
                "D",
                "Er repräsentierte früher den Winter",
                "Er hat meistens eine Karotten-Nase",
                "Augen bestehen aus Steinen oder Kohlen",
                "Muss mindestens 1,5m hoch sein"
            ];
            answers[4] = [
                "C",
                "Jagatee",
                "Feuerzangenbowle",
                "Mojito",
                "Lumbumba"
            ];
            answers[5] = [
                "B",
                "Annazweige",
                "Barbarazweige",
                "Biancazweige",
                "Mariazweige"
            ];

            var rightA;
            function setQandA() {
                document.getElementById("question").innerHTML = questions[qaNumber];
                document.getElementById("answer-A").innerHTML = answers[qaNumber][1];
                document.getElementById("answer-B").innerHTML = answers[qaNumber][2];
                document.getElementById("answer-C").innerHTML = answers[qaNumber][3];
                document.getElementById("answer-D").innerHTML = answers[qaNumber][4];
                rightA = answers[qaNumber][0];
            }

            var right = 0;
            var wrong = 0;
            var percent = 0;
            var acceptAnswers = true;
            var winnerDetected = false;
            var winnerID = "";

            // Enable pusher logging - don't include this in production
            Pusher.log = function (message) {
                if (window.console && window.console.log) {
                    window.console.log(message);
                }
            };

            var pusher = new Pusher('436afa5718199f3db91b');
            var channel = pusher.subscribe('channel1');
            channel.bind('answer', function (data) {
                var mes = data.message.toString().split('E');
                if (acceptAnswers) {
                    if (mes[0] == rightA) {
                        right++;
                        if (!winnerDetected)
                        {
                            winnerDetected = true;
                            winnerID = mes[1];
                        }
                    } else {
                        wrong++;
                    }
                    //alert("right: " + right + ", wrong: " + wrong);
                    //document.getElementById("rightAnswers").textContent = right.toString();
                    //document.getElementById("wrongAnswers").textContent = wrong.toString();
                    document.getElementById("nrAns").textContent = (right + wrong).toString();

                    percent = (right) / (right + wrong) * 100;
                    document.getElementById("analysisLink").setAttribute("href", "quizanalysis.php?Akh=10&Kar=" + percent + "&Rat=30&Spi=40");
                }
            });

            var request = new XMLHttpRequest();

            function quizEndMsg(id) {
                //alert("server send quizEndmsg!");
                request.open('post', "pusherQuizEnded.php?winnerID=" + id, true);
                request.send(null);
            }


            var startTime = new Date().getTime();
            var seconds = 60;
            var endTime = startTime + seconds * 1000;

            var max = 100;
            var counter = max;
            var interval = 100;
            var x = max / seconds * (interval / 1000);

            function countdown() {
                var bar = document.getElementById("pbarTimer");

                var cint = setInterval(function () {
                    if (counter - x < 0 || (new Date().getTime() >= endTime)) {
                        bar.style.width = 0;

                        showRightAnswer();
                            quizEndMsg(winnerID);
                            window.setTimeout(function () {
                                window.location.href = document.getElementById("analysisLink").getAttribute("href");
                            }, 3000);
                            clearInterval(cint);
                    } else {
                        counter = counter - x;
                        bar.style.width = counter + "%";
                    }

                }, interval)
            }

            function showRightAnswer() {
                acceptAnswers = false;
                var button = document.getElementById("answer-" + rightA);
                button.style.background = "#00FF00";
            }

            function startFunction() {
                countdown();
                setQandA();
            }


        </script>

    </head>
    <body onload="startFunction()">
        <section id="header">
            <a href="index.html"> <- Index</a>
            <a id="analysisLink" href="quizanalysis.php?Akh=10&Kar=20&Rat=30&Spi=40">Quiz-Analysis -></a>
            <h1> QUIZ</h1>            
        </section>

        <div id="content">
            <h2 id="question"> </h2>

            <div id="pbarTimer" class="progress">
                <div class="progress-bar-success" style="width: 100%; background-color: #5cb85c"></div>
            </div>

            <div id="answers">
                <button class="btn-xl btn-primary btn-block" id="answer-A"></button>
                <button class="btn-xl btn-primary btn-block" id="answer-B"></button>
                <button class="btn-xl btn-primary btn-block" id="answer-C"></button>
                <button class="btn-xl btn-primary btn-block" id="answer-D"></button>
            </div>

        </div>

        <div class="community" style="position:absolute;bottom:-45px;right:105px;">  
            <p style="font-size:20px"> Antworten:  <label id="nrAns">0</label> </p>
            <label id="users" style="font-size:20px">137</label>
            <img src="pics/users1.jpg" width="64px" height="64px">
        </div>

        <section id="footer">
            <div id="qr-box">
                <a href="quizmobile.php">
                    <img id="code"  src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fdacima.lima-city.de%2Fquizmobile.php&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" alt="qr code" />                </a>
            </div>
        </section>


    </body>
</html>
