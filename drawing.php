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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>var request = new XMLHttpRequest();</script>
        <script type="text/javascript" src="js/drawing.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    </head>
    <body onload="init()">
        <div class="row-fluid" style="margin-top: 2%;">
            <div class="col-xs-4">
                <button class="btn btn-warning center-block" onclick="">abbrechen</button>
            </div>
            <div class="col-xs-4">
                <div class="text-center">
                    <h4>Objekt: Gitarre</h4>
                </div>
            </div>
            <div class="col-xs-4">
                <form name="countdownform">
                        <input id="input" name="countdowninput">
                </form>
            </div>
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
    </body>
</html>
