<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 //ONLY TO TEST - CAN BE DELETED!


require('Pusher.php');

$app_id = '99616';
$app_key = '436afa5718199f3db91b';
$app_secret = '64d6a3ff543ab0434d4f';

$pusher = new Pusher($app_key, $app_secret, $app_id);

$data['message'] = 'hello world1';
$pusher->trigger('channel1', 'answer', $data);

?>