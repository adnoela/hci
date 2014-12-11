<?php include 'sessionmobile.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>drawing screen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>var request = new XMLHttpRequest();</script>
        <script type="text/javascript" src="js/drawing.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script src="//js.pusher.com/2.2/pusher.min.js"></script>
        <script type="text/javascript">
            var pusher = new Pusher('85b8dbe2ce68623ad71a');
            var channel = pusher.subscribe('test-channel');
            channel.bind('drawend-event', function (data) {
                end();
            });
        </script>
    </head>
    <body onload="init()">
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <a href="mobilefoto.php">
                        <button type="button" class="btn btn-primary" disabled="true">Fotostream</button>
                    </a>
                </div>
                <div class="btn-group" role="group">
                    <a href="drawquiz.php">
                        <button type="button" class="btn btn-success" disabled="true">Drawing-Quiz</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="row-fluid" style="margin-top: 2%;">
            <div class="col-xs-4"></div>
            <div class="col-xs-4">
                <div class="text-center">
                    <h4>Objekt: Tannenbaum</h4>
                </div>
            </div>
            <div class="col-xs-4"></div>
        </div>
        <div id="canvasDiv"> 
            <canvas id="can" width="400" height="400" style="border: 2px solid;"></canvas>
        </div>
        <div class="col-xs-6">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" autofocus="true" onclick="small()">Klein</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" onclick="middle()">Mittel</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" onclick="large()">Groß</button>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <button type="button" class="btn btn-danger center-block" onclick="erase()" autofocus="false">Zeichnung löschen</button>
        </div>
        
        <div id="end" style="position:absolute;top:25%;left:25%;width:50%;height:40%;border:2px solid;visibility:hidden;"></div>
    </body>
</html>
