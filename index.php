<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="//js.pusher.com/2.2/pusher.min.js"></script>
    <script type="text/javascript">
        var pusher = new Pusher('85b8dbe2ce68623ad71a');
        var channel = pusher.subscribe('test-channel');
        channel.bind('test-event', function (data) {
            alert('This was sent: ' + data.message);
            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext('2d');

            ctx.fillStyle = "rgb(190,135,135)";
            ctx.fillRect(20, 20, 200, 100);  // Rotes Viereck mit Ursprung (20,20)
            ctx.fillStyle = "rgba(135,190,135,0.5)";
            ctx.fillRect(80, 60, 300, 100);  // Grünes Viereck mit Ursprung (80,60)

        });
    </script>

    </head>
    <body>

        <section id="header">
            <a href="quizscreen.html">Zum Quiz</a>

            <h1>Overview</h1>
        </section>
        <section id="content">
            <canvas id="canvas" width="600" height="500" style="border:solid black 1px;">
            Your browser does not support canvas element.
        </canvas>
        </section>
        <section id="footer">
            <div id="qr-box">
                <a href="drawing.php">
                    <img id="code" src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fdacima.esy.es%2Fdrawing.php&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" alt="qr code" />                </a>
            </div>
        </section>
    </body>
</html>
