
<?php
include 'sessionscreen.php';
$Akh = $_GET["Akh"];
$Kar = $_GET["Kar"];
$Rat = $_GET["Rat"];
$Spi = $_GET["Spi"];
?>
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

        <script src="lib/Chart.js"></script>
        <!--script type="text/javascript" src="js/barchart.js"></script!-->
        <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>

    </head>

    <body >

        <section id="header">
            <a href="quizscreen.html"></a>
            <br>
            <p><h1> QUIZ - Standortvergleich</h1> </p>           
        </section>

        <section id="content">
            <h3>Hier werden die richtigen Antworten prozentuell pro Standort verglichen.
                <br> Sie befinden sich am:</h3>
            <h2> Karlsplatz.</h2>
            <div>
                <p style="text-align: left; margin-left: 15%"><label style="font-size: 20px; text-align: left">Prozent</label></p>
                <canvas id="canvas" width="900" height="350" style="background-color: #FFFFFF;">
                    <p>Dieses Beispiel benötigt einen Webbrowser mit aktivierter
                        <a href="http://de.wikipedia.org/wiki/Canvas_(HTML-Element)">HTML Canvas</a>-Unterstützung.</p>
                </canvas
                <p > <label style="text-align: right; font-size: 20px; font-weight: bold ">Standorte</label> </p>
            </div>
            
        </section>

        <div class="text-center">
            <br>
            <p><h3> In Kürze folgt das Draw-Quiz.
                <br>Möchten Sie mitspielen? Einfach den QR-Code scannen!</h3></p>
        </div>
        <!--div class="community" style="position:absolute;bottom:-65px;right:105px;">            
        <label id="users" style="font-size:20px">137</label>
        <img src="pics/users1.jpg" width="64px" height="64px">
        </div-->
        
        <div id="qr-box">
            <a href="drawquiz.php" style>
            <img id="code" src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fdacima.lima-city.de%2Fdrawquiz.php&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" alt="qr code" />            
            </a>
        </div>


        <script>
            var locations = ["Altes AKH", "Karlsplatz", "Rathaus", "Spittelberg"];
            //var myData = [30, 45, 42, 32];
            var akh = <?php echo $Akh; ?>;
            var kar = <?php echo $Kar; ?>;
            var rat = <?php echo $Rat; ?>;
            var spi = <?php echo $Spi; ?>;
            var myData = [akh, kar, rat, spi];

            var barChartData = {
                labels: locations,
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(120,120,120,0.8)",
                        highlightFill: "rgba(120,120,120,0.75)",
                        highlightStroke: "rgba(220,220,220,1)",
                        data: myData
                    }
                ]

            }
            
            window.onload = function () {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData);
                nextPage();
            }

            function updateChart() {
                //update bar1
                myBar.datasets[0].bars[0].value = 50;
                myBar.update();
            }

            function nextPage() {
                //alert("next page!");
                window.setTimeout(function () {
                    startDrawing();
                    window.location.href = "http://dacima.lima-city.de/index.php";
                }, 15000);
            }

            var request = new XMLHttpRequest();

            function startDrawing() {
                // alert("server send quizEndmsg!");
                request.open('post', "pusherStartDrawing.php", true);
                request.send(null);
            }


        </script>
    </body>


</html>
