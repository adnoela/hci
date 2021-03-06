<?php
$status = file_get_contents("status.txt");
if ($status === "quiz")
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . (dirname($_SERVER['PHP_SELF']) == '/' ? '' : dirname($_SERVER['PHP_SELF'])) .  '/quizmobile.php');
    exit;
}

$filename = "drawingstatus.txt";
$drawinground = file_get_contents($filename);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>drawing quiz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>var request = new XMLHttpRequest();</script>
        <script type="text/javascript" src="js/drawing.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script src="//js.pusher.com/2.2/pusher.min.js"></script>
        <script type="text/javascript">
            var pusher = new Pusher('85b8dbe2ce68623ad71a');
            var channel = pusher.subscribe('test-channel');
            channel.bind('drawend-event', function (data) {
                endquiz();
            });

            //TODO php var setzen
            var drawingNumber = <?php echo $drawinground; ?>;
            var answers = new Array(3);
            answers[0] = [
                "A",
                "Weihnachtsbaum",
                "Tannenzweig",
                "Maibaum",
                "Eiszapfen"
            ];
            answers[1] = [
                "C",
                "Weihnachtsmann",
                "Nikolaus",
                "Elf",
                "Goblin"
            ];
            answers[2] = [
                "D",
                "Geschenkspapier",
                "Geschenk",
                "Schleife",
                "Geschenksband"
            ];
            var rightA;
            function setQandA() {
                document.getElementById("btnA").innerHTML = answers[drawingNumber][1];
                document.getElementById("btnB").innerHTML = answers[drawingNumber][2];
                document.getElementById("btnC").innerHTML = answers[drawingNumber][3];
                document.getElementById("btnD").innerHTML = answers[drawingNumber][4];
                rightA = answers[drawingNumber][0];
            }


        </script>
    </head>
    <body onload="setQandA()">
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <a href="mobilefoto.php">
                        <button type="button" class="btn btn-success" style="opacity: 0.7;">Fotostream</button>
                    </a>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success">Drawing-Quiz</button>
                </div>
            </div>
        </div>


        <div class="text-center">
            <h4>Was wird am Public-Screen gezeichnet? <br> ACHTUNG: Ihre 1. Auswahl ist endgültig! Die Auflösung erfolgt, wenn die 
                Zeit auf dem Public-Screen abgelaufen ist!</h4>
        </div>
    </div>
    <div class="drawanswer">
        <button id="btnA" class="btn-xl btn-primary btn-block" onclick="answer('A')">Tannenbaum</button> 
    </div>
    <div class="drawanswer">
        <button id="btnB" class="btn-xl btn-primary btn-block" onclick="answer('B')">Gitarre</button> 
    </div>
    <div class="drawanswer">
        <button id="btnC" class="btn-xl btn-primary btn-block" onclick="answer('C')">Smarthone</button> 
    </div>
    <div class="drawanswer">
        <button id="btnD" class="btn-xl btn-primary btn-block" onclick="answer('D')">Pizzaschneider</button> 
    </div>

    <div id="end" style="position:absolute;top:1%;width:98%;left:1%;right:1%;height:15%;border:3px solid;visibility:hidden;"></div>
</body>
</html>
