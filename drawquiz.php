<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>drawing quiz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>var request = new XMLHttpRequest();</script>
        <script type="text/javascript" src="js/drawing.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <a href="mobilefoto.php">
                    <button type="button" class="btn btn-primary">Fotostream</button>
                    </a>
                </div>
                <div class="btn-group" role="group">
                    <a href="drawquiz.php">
                    <button type="button" class="btn btn-success" autofocus="true">Drawing-Quiz</button>
                    </a>
                </div>
            </div>
        </div>
        
        
        <div id="firstrow" class="row-fluid">
            <div class="col-xs-4">
                <button class="btn btn-warning center-block" onclick="">abbrechen</button>
            </div>
            <div class="col-xs-4">
                <div class="text-center">
                    <h4>Paint-Quiz</h4>
                </div>
            </div>
            <div class="col-xs-4"></div>
        </div>
        <div class="drawanswer">
            <button class="btn-xl btn-primary btn-block" onclick="answer('A')">Tannenbaum</button> 
        </div>
        <div class="drawanswer">
            <button class="btn-xl btn-primary btn-block" onclick="answer('B')">Gitarre</button> 
        </div>
        <div class="drawanswer">
            <button class="btn-xl btn-primary btn-block" onclick="answer('C')">Smarthone</button> 
        </div>
        <div class="drawanswer">
            <button class="btn-xl btn-primary btn-block" onclick="answer('D')">Pizzaschneider</button> 
        </div>
        
    </body>
</html>
