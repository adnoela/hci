<?php

require('Pusher.php');

$app_id = '97922';
$app_key = '85b8dbe2ce68623ad71a';
$app_secret = '43c87684389502072851';

$pusher = new Pusher($app_key, $app_secret, $app_id);
$data['message'] = 'start';
$pusher->trigger('test-channel', 'countdown-event', $data);
