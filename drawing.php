<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="js/main.js"></script>
    </head>
    <body onload="startup()">
        <canvas id="canvas" width="600" height="600" style="border:solid black 1px;">
            Your browser does not support canvas element.
        </canvas>
        <form method="post">
            <input name="data" type="text">
            <input type="submit" name="submit" value="abschicken">
        </form>
        <pre id="log" style="border: 1px solid #ccc;"></pre>

        <?php
        if (isset($_POST['submit'])) {
            require('Pusher.php');

            $app_id = '97922';
            $app_key = '85b8dbe2ce68623ad71a';
            $app_secret = '43c87684389502072851';

            $pusher = new Pusher($app_key, $app_secret, $app_id);

            $data['message'] = $_POST["data"];
            $pusher->trigger('test-channel', 'test-event', $data);
        }
        ?>
    </body>

</html>
