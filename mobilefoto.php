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

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <style>
            .thumbnail {
                float: left;
                width: 45%;
                height: 378px;
                margin: 2%;
            }
            .pictures {
                margin-top: 5%;
            }
        </style>
        <title></title>
    </head>
    <body>
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary">Fotostream</button>
                </div>

                <div class="btn-group" role="group">
                    <a href="quizmobile.php">
                        <button type="button" class="btn btn-success" autofocus="true">Drawing-Quiz</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="pictures">
            <img class="thumbnail" src="pics/markt1.jpg">
            <img class="thumbnail" src="pics/markt2.jpg">
            <img class="thumbnail" src="pics/markt3.jpg">
            <img class="thumbnail" src="pics/markt4.jpg">
            <img class="thumbnail" src="pics/markt5.jpg">
            <img class="thumbnail" src="pics/markt6.jpg">
            <img class="thumbnail" src="pics/markt7.jpg">    
        </div>

    </body>
</html>
