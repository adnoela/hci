

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
            var right = 0;
            var wrong = 0;
            var percent = 0;
            var acceptAnswers = true;

            // Enable pusher logging - don't include this in production
            Pusher.log = function (message) {
                if (window.console && window.console.log) {
                    window.console.log(message);
                }
            };

            var pusher = new Pusher('436afa5718199f3db91b');
            var channel = pusher.subscribe('channel1');
            channel.bind('answer', function (data) {
                //alert(data.message);
                if (acceptAnswers) {
                    if (data.message == "A") {
                        right++;
                    } else {
                        wrong++;
                    }
                    //alert("right: " + right + ", wrong: " + wrong);
                    document.getElementById("rightAnswers").textContent = right.toString();
                    document.getElementById("wrongAnswers").textContent = wrong.toString();

                    percent = (right) / (right + wrong) * 100;
                    document.getElementById("analysisLink").setAttribute("href", "quizanalysis.php?Akh=10&Kar=" + percent + "&Rat=30&Spi=40");
                }
            });

            var request = new XMLHttpRequest();
          
            function quizEndMsg(winnerID) {
               // alert("server send quizEndmsg!");
                request.open('post', "pusherQuizEnded.php?winnerID=" + winnerID, true);
                request.send(null);
            }


            var startTime = new Date().getTime();
            var seconds = 20;
            var endTime = startTime + seconds * 1000;

            var max = 100;
            var counter = max;
            var interval = 100;
            var x = max / seconds * (interval / 1000);

            function countdown() {
                var bar = document.getElementById("pbarTimer");
                var cint = setInterval(function () {
                    if (counter - x < 0 || (new Date().getTime() >= endTime)) {
                        bar.value = 0;
                        
                        showRightAnswer();
                        quizEndMsg("na");
                        window.setTimeout(function () {
                            window.location.href = document.getElementById("analysisLink").getAttribute("href");
                        }, 3000);
                        clearInterval(cint);

                    } else {
                        counter = counter - x;
                        bar.value = counter;
                    }

                }, interval)
            }

            function showRightAnswer() {
                acceptAnswers = false;
                var button = document.getElementById("answer-A");
                button.style.backgroundColor = "#00FF00";
            }



        </script>

    </head>
    <body onload="countdown()">
        <section id="header">
            <a href="index.html"> <- Index</a>
            <a id="analysisLink" href="quizanalysis.php?Akh=10&Kar=20&Rat=30&Spi=40">Quiz-Analysis -></a>
            <h1> QUIZ </h1>            
        </section>

        <section id="content">
            <h2 id="question"> Wann ist der vierte Advent?  </h2>

            <div id="quiz-time">
                <progress id="pbarTimer" value="100" max="100"></progress>
            </div>

            <div id="answers">
                <button class="btn-xl btn-primary btn-block" id="answer-A">Sonntag vor Weihnachen</button>
                <button class="btn-xl btn-primary btn-block" id="answer-B">Am 24. Dezember</button>
                <button class="btn-xl btn-primary btn-block" id="answer-C">Vierte Samstag im Dezember</button>
                <button class="btn-xl btn-primary btn-block" id="answer-D">Vierte Sonntag im Dezember</button>
            </div>

        </section>

        <aside id="community">
            <p>TODO: Community Info</p>
            <p>right: <label id="rightAnswers">0</label>, wrong: <label id="wrongAnswers">0</label>
            </p>

        </aside>
        <section id="footer">
            <div id="qr-box">
                <a href="quizmobile.php">
                    <img id="code" src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=dacima.esy.es%2Fquizmobile.php&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" alt="qr code" />
                </a>
            </div>
        </section>


    </body>
</html>
