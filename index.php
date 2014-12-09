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
            var size=2;
            channel.bind('test-event', function (data) {
                var mess, prevX = 0, prevY = 0, currX = 0, currY = 0;
                
                var canvas = document.getElementById('canvas');
                var ctx = canvas.getContext('2d');
                mess = data.message;
                if (mess.indexOf('u') === 0)
                        mess = mess.slice(9, mess.length);
        
                if (mess.indexOf('c') === 0) {
                    ctx.clearRect(0,0,canvas.width, canvas.height);
                }
                else if(mess.indexOf('s') === 0){
                    size=2;
                }
                else if(mess.indexOf('m') === 0){
                    size=4;
                }
                else if(mess.indexOf('l') === 0){
                    size=6;
                }
                
                else {
                    var coor = "" + mess;
                    coor = coor.split(" ");
                    for (var i = 0; i < coor.length; i += 2) {
                        prevX = coor[i];
                        prevY = coor[i + 1];
                        currX = coor[i + 2];
                        currY = coor[i + 3];
                        ctx.beginPath();
                        ctx.moveTo(prevX, prevY);
                        ctx.lineTo(currX, currY);
                        ctx.strokeStyle = "black";
                        ctx.lineWidth = size;
                        ctx.stroke();
                        ctx.closePath();
                    }
                }
            });
        </script>

    </head>
    <body>

        <section id="header">
            <a href="quizscreen.html">Zum Quiz</a>

            <h1>Overview</h1>
        </section>
        <section id="content">
            <canvas id="canvas" width="400" height="400" style="position:absolute;top:30%;left:30%;border:2px solid;"></canvas>
        </section>
        <section id="footer">
            <div id="qr-box">
                <a href="drawing.php">
                    <img id="code" src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fdacima.esy.es%2Fdrawing.php&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" alt="qr code" />                </a>
            </div>
        </section>
    </body>
</html>
