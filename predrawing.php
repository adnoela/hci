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
            }
        </script>
    </head>
    <body onload = "findRightAnswer()">
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <a href="mobilefoto.php">
                        <button type="button" class="btn btn-primary">Fotostream</button>
                    </a>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success" autofocus="true">Drawing-Quiz</button>
                </div>
            </div>
        </div>
        
        <div id="explanation">
            Glückwunsch, Sie haben das Quiz gewonnen und müssen folgenden Begriff zeichnen:
            <div id="drawobject"></div>
        </div>
    </body>
</html>
