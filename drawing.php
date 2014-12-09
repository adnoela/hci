<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>drawing screen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <script>var request = new XMLHttpRequest();</script>
        <script type="text/javascript" src="js/drawing.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    </head>
    <body onload="init()">
        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-default" onclick="">abbrechen</button>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3"></div>
        </div>
        <div id="canvasDiv"> 
            <canvas id="can" height="400" width="400"></canvas>
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
           <button type="button" class="btn center-block" onclick="erase()">alles loeschen</button>
                </div>
            </div>
        </div>
    </body>
</html>
