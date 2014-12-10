<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require('Pusher.php');

$app_id = '99616';
$app_key = '436afa5718199f3db91b';
$app_secret = '64d6a3ff543ab0434d4f';

$pusher = new Pusher($app_key, $app_secret, $app_id);

$data['message'] = $_REQUEST["winnerID"];

//$data['message'] = 'hello world2';
$pusher->trigger('quizEndChannel', 'quizEnded', $data);

?>
<html><body>send time!</body></html>
