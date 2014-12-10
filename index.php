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
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="//js.pusher.com/2.2/pusher.min.js"></script>
        <script src="js/maindrawing.js"></script>
        <script type="text/javascript">
            var pusher = new Pusher('85b8dbe2ce68623ad71a');
            var channel = pusher.subscribe('test-channel');
            var count = 0;
            var size = screen.width * 0.42;
            size = size / 400;
            strichgr = 2 * size;
            channel.bind('test-event', function (data) {
                var mess, prevX = 0, prevY = 0, currX = 0, currY = 0;


                var canvas = document.getElementById('canvas');
                var ctx = canvas.getContext('2d');
                mess = data.message;
                if (mess.indexOf('u') === 0)
                    mess = mess.slice(9, mess.length);

                if (mess.indexOf('c') === 0) {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                }
                else if (mess.indexOf('s') === 0) {
                    strichgr = size * 2;
                }
                else if (mess.indexOf('m') === 0) {
                    strichgr = size * 4;
                }
                else if (mess.indexOf('l') === 0) {
                    strichgr = size * 8;
                }
                else {
                    var coor = "" + mess;
                    coor = coor.split(" ");
                    if (coor.length < 3) {
                        ctx.fillRect(coor[0] * size, coor[1] * size, strichgr, strichgr);
                        ctx.fillStyle = "black";
                        ctx.fill();
                    }
                    else {
                        for (var i = 0; i < coor.length; i += 2) {
                            prevX = coor[i] * size;
                            prevY = coor[i + 1] * size;
                            currX = coor[i + 2] * size;
                            currY = coor[i + 3] * size;
                            ctx.beginPath();
                            ctx.moveTo(prevX, prevY);
                            ctx.lineTo(currX, currY);
                            ctx.strokeStyle = "black";
                            ctx.lineWidth = strichgr;
                            ctx.stroke();
                            ctx.closePath();
                        }
                    }
                }
            });
            channel.bind('answer-event', function (data) {
                if (data.message.charAt(0) === ('A')) {
                    count++;
                    document.counterform.counter.value = "Richtige Antworten: " + count;
                }
            });
            channel.bind('countdown-event', function (data) {
                alert("start");
                countdown();
            })


        </script>

    </head>
    <body onload="init()" style="height: 100%;">

        <div class="row-fluid" style="width:100%;min-height: 15%;">
            <div class="col-md-3""></div>
            <div class="col-md-6">
                <div class="text-center">
                    <h1>Was wird hier gemalt?</h1>
                </div>
            </div>
            <div class="col-md-3" style="margin-top:1%;">
                <form name="countdownform">
                    <input id="input" name="countdown" size="30" value="Verbleibende Zeit: 60 Sekunden">
                </form>
                <form name="counterform">
                    <input id="input" name="counter" size="30" value="Richtige Antworten: 0">
                </form>
            </div>
        </div>
        <div class="canvasBox">
            <canvas id="canvas" style="border: 2px solid;"></canvas>
        </div>
        <div class="col-md-4" style="height:85%; margin-top: -2%; margin-left: 3%;">
            <div class="drawanswer1">
                <button class="btn-xl btn-primary btn-block" onclick="answer('A')">Tannenbaum</button> 
            </div>
            <div class="drawanswer1">
                <button class="btn-xl btn-primary btn-block" onclick="answer('B')">Gitarre</button> 
            </div>
            <div class="drawanswer1">
                <button class="btn-xl btn-primary btn-block" onclick="answer('C')">Smarthone</button> 
            </div>
            <div class="drawanswer1">
                <button class="btn-xl btn-primary btn-block" onclick="answer('D')">Pizzaschneider</button> 
            </div>
        </div>
        <div class="qrBox">
            <a href="drawquiz.php" style>
                <img id="code" src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fdacima.esy.es%2Fdrawquiz.php&amp;qzone=1&amp;margin=0&amp;size=400x400&amp;ecc=L" alt="qr code" />            
            </a>
        </div>


    </body>
</html>
<!--




-->
