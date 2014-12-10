<?php

require('Pusher.php');

$app_id = '99616';
$app_key = '436afa5718199f3db91b';
$app_secret = '64d6a3ff543ab0434d4f';

$pusher = new Pusher($app_key, $app_secret, $app_id);

//$data['message'] = $_REQUEST[""];

//$data['message'] = 'hello world2';
$pusher->trigger('quizDrawChannel', 'startDrawing', 'na');

?>
<html><body>send time!</body></html>
