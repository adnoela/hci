<?php
include 'sessionmobile.php';
if ($_SESSION['currentpage'] === "quiz") {
    
} elseif ($_SESSION['currentpage'] === "drawquiz") {
    if ($_SESSION['drawing']) {
        header('Location: http://' . $hostname . ($path == '/' ? '' : $path) . '/drawing.php');
        exit;
    } else {
        
    }
    exit;
}


$quizstatus = file_get_contents("quizstatus.txt");
//} elseif ($_SESSION['currentpage'] === "drawquiz") {
//    header('Location: http://' . $hostname . ($path == '/' ? '' : $path) . '/drawquiz.php');
//    exit;
//}
?>
<html>
    <head>
        <title>Quiz</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
        <script>
            var php_var = '<?php echo session_id(); ?>';

            //TODO php var setzen
            var qaNumber = <?php echo substr($quizstatus, -1); ?>;
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
                "Augen bestehen aus Kieselsteinen oder Kohlen",
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
            function setQandA () {
                document.getElementById("question").innerHTML = questions[qaNumber];
                document.getElementById("btnA").innerHTML = answers[qaNumber][1];
                document.getElementById("btnB").innerHTML = answers[qaNumber][2];
                document.getElementById("btnC").innerHTML = answers[qaNumber][3];
                document.getElementById("btnD").innerHTML = answers[qaNumber][4];
                rightA = answers[qaNumber][0];
            }

            var pusher = new Pusher('436afa5718199f3db91b');
            var answerChannel = pusher.subscribe('quizEndChannel');
            answerChannel.bind('quizEnded', function (data) {
                endQuiz(data.message.toString());
                //alert(data.message.toString());
            });

            var drawChannel = pusher.subscribe('quizDrawChannel');
            drawChannel.bind('startDrawing', function (data) {
                startDrawing(data.message.toString());
            });


            var request = new XMLHttpRequest();

            function sendAnswer(answer) {

                var btn = document.getElementsByClassName('btn-x2');
                for (var i = 0; i < btn.length; i++) {
                    btn[i].disabled = "true";
                    btn[i].style.background = '#696969';
                }

                btn = document.getElementById('btn' + answer);
                btn.style.background = '#FFA500';

                request.open('post', "pusherAnswer.php?input=" + answer + "E" + php_var, true);
                request.send(null);
            }
            

            function endQuiz(id) {
                //TODO: check if this is the winner!
                showRightAnswer(rightA);
                if (id == php_var)
                {
                    // setTimeout(function(){ window.location.href = "http://dacima.lima-city.de/drawing.php"; }, 3000);
                    window.location.href = "http://dacima.lima-city.de/drawing.php";
                }
                else if(id == "reload")
                {
                    //alert("reload");
                    window.setTimeout(function () {
                                location.reload();
                            }, 3000);
                }
                else
                {
                    setTimeout(function(){ window.location.href = "http://dacima.lima-city.de/drawquiz.php"; }, 7000);

                    //window.location.href = "http://dacima.lima-city.de/drawquiz.php";
                }
            }

            function startDrawing(mes) {
                window.location.href = "http://dacima.lima-city.de/drawquiz.php";
            }


            function showRightAnswer(rightAnswer) {
                var button = document.getElementById('btn' + rightAnswer);
                button.style.background = "#00FF00";
            }

        </script>

    </head>
    <body onload ="setQandA()" >
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <a href="mobilefoto.php">
                        <button type="button" class="btn btn-primary">Fotostream</button>
                    </a>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success" autofocus="true">Quiz</button>
                </div>
            </div>
        </div>
        <div id="firstrow" class="row-fluid">
            <div class="col-xs-4"></div>
            <div class="col-xs-4">
                <div class="text-justify"> 
                    <h4 id="question">abc</h4>
                </div>           
            </div>
            <div class="col-xs-4"></div>
        </div>

            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnA" onclick="sendAnswer('A')"></button>
            </div>
            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnB" onclick="sendAnswer('B')"></button>
            </div>
            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnC" onclick="sendAnswer('C')"></button>
            </div>
            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnD" onclick="sendAnswer('D')"></button>
            </div>

    </div>


</body>
</html>
