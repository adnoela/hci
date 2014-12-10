
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
            
           
            var pusher = new Pusher('436afa5718199f3db91b');
            var answerChannel = pusher.subscribe('quizEndChannel');
            answerChannel.bind('quizEnded', function (data) {
                //alert("quiz ended!")
                endQuiz(data.message);
            });
            
            var request = new XMLHttpRequest();

            function sendAnswer(answer) {
                request.open('post', "pusherAnswer.php?input=" + answer, true);
                request.send(null);

                document.getElementById("answer-A").disabled = true;
                document.getElementById("answer-B").disabled = true;
                document.getElementById("answer-C").disabled = true;
                document.getElementById("answer-D").disabled = true;
            }
            
            function endQuiz(winnerID) {
                //TODO: check if this is the winner!
                showRightAnswer();
                window.setTimeout(function(){
        window.location.href = "http://dacima.esy.es/drawquiz.php";
    }, 8000);
                
                
            }
            
            
            function showRightAnswer() {
                var button = document.getElementById("answer-A");
                button.style.backgroundColor = "#00FF00";
            }

        </script>

    </head>
    <body>
        <section id="header">
            <h1> QUIZ </h1>            
        </section>

        <section id="content">
            <h2 id="question"> Wann ist der vierte Advent?  </h2>


            <div id="answers">
                <button id="answer-A" onclick="sendAnswer('A')">Sonntag vor Weihnachen</button>
                <button id="answer-B" onclick="sendAnswer('B')">Am 24. Dezember</button>
                <button id="answer-C" onclick="sendAnswer('C')">Vierte Samstag im Dezember</button>
                <button id="answer-D" onclick="sendAnswer('D')">Vierte Sonntag im Dezember</button>
            </div>

        </section>


    </body>
</html>
