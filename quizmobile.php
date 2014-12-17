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
        <link rel="stylesheet" href="css/main.css">

        <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
        <script>
            var php_var = '<?php echo session_id(); ?>';

            var pusher = new Pusher('436afa5718199f3db91b');
            var answerChannel = pusher.subscribe('quizEndChannel');
            answerChannel.bind('quizEnded', function (data) {
                endQuiz(data.message.toString());
            });

            var drawChannel = pusher.subscribe('quizDrawChannel');
            drawChannel.bind('startDrawing', function (data) {
                //alert("start drawing!");
                startDrawing();
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

                //document.getElementById("answer-A").disabled = true;
                //document.getElementById("answer-B").disabled = true;
                //document.getElementById("answer-C").disabled = true;
                //document.getElementById("answer-D").disabled = true;
            }

            function endQuiz(id) {
                //TODO: check if this is the winner!
                showRightAnswer('A');
                if (id == php_var)
                {
                    // setTimeout(function(){ window.location.href = "http://dacima.lima-city.de/drawing.php"; }, 3000);
                    window.location.href = "http://dacima.lima-city.de/drawing.php";
                }
                else
                {
                    //setTimeout(function(){ window.location.href = "http://dacima.lima-city.de/drawquiz.php"; }, 3000);

                    window.location.href = "http://dacima.lima-city.de/drawquiz.php";
                }
            }

            function startDrawing() {
                window.location.href = "http://dacima.lima-city.de/drawquiz.php";
            }


            function showRightAnswer(rightAnswer) {
                var button = document.getElementById('btn' + rightAnswer);
                button.style.background = "#00FF00";
            }

        </script>

    </head>
    <body>
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
                <div class="text-center"> 
                    <h3>Wann ist der vierte Advent? </h3>
                </div>           
            </div>
            <div class="col-xs-4"></div>
        </div>
        <div class="quizanswers">

            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnA" onclick="sendAnswer('A')">Sonntag vor Weihnachen</button>
            </div>
            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnB" onclick="sendAnswer('B')">Am 24. Dezember</button>
            </div>
            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnC" onclick="sendAnswer('C')">Vierte Samstag im Dezember</button>
            </div>
            <div class="qanswer">
                <button class="btn-x2 btn-primary btn-block" id="btnD" onclick="sendAnswer('D')">Vierte Sonntag im Dezember</button>
            </div>
        </div>

    </div>


</body>
</html>
