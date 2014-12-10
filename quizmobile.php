<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Quiz</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script>
            var request = new XMLHttpRequest();

            function sendAnswer(answer) {
                request.open('post', "pusherAnswer.php?input=" + answer, true);
                request.send(null);
            }
        </script>

    </head>
    <body>
        <section id="header">
            <h1> QUIZ </h1>            
        </section>

        <section id="content">
            <h2 id="question"> Wann ist der vierte Advent?  </h2>

            <div id="quiz-time">
                <progress value="100" max="100"></progress>
            </div>

            <div id="answers">
                <button id="answer-A" onclick="sendAnswer('A')">Sonntag vor Weihnachen</button>
                <button id="answer-B" onclick="sendAnswer('B')">Am 24. Dezember</button>
                <button id="answer-C" onclick="sendAnswer('C')">Vierte Samstag im Dezember</button>
                <button id="answer-D" onclick="sendAnswer('D')">Vierte Sonntag im Dezember</button>
            </div>

        </section>


    </body>
</html>
