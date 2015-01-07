<?php
$filename = "drawingstatus.txt";
$drawinground = file_get_contents($filename);
if($drawinground == 0)
{
    $drawinground = 1;
}
if($drawinground == 1)
{
    $drawinground = 2;
}
if($drawinground == 2)
{
    $drawinground = 0;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script>
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
            
            function findRightAnswer()
            {
                var drawobject;
                var rightA = answers[drawingNumber][0];
                if(rightA == "A")
                {
                    drawobject = answers[drawingNumber][1];
                }
                if(rightA == "B")
                {
                    drawobject = answers[drawingNumber][2];
                }
                if(rightA == "C")
                {
                    drawobject = answers[drawingNumber][3];
                }
                if(rightA == "D")
                {
                    drawobject = answers[drawingNumber][4];
                }
                document.getElementById("drawobject").innerHTML = drawobject;
                
                window.setTimeout(function () {
                        window.location.href = "http://dacima.lima-city.de/drawing.php"+"?answer="+drawobject;
                    }, 10000);
            }
        </script>
    </head>
    <body onload = "findRightAnswer()">
        
        <div id="explanation">
            Glückwunsch, Sie haben das Quiz gewonnen und müssen folgenden Begriff zeichnen:
            <div id="drawobject"></div>
        </div>
    </body>
</html>
