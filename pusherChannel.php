<?php
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
 //ONLY TO TEST - CAN BE DELETED!
<html>

<head>
  <title>Pusher Test</title>
  <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher('436afa5718199f3db91b');
    var channel = pusher.subscribe('channel1');
    channel.bind('answer', function(data) {
      alert(data.message);
    });
  </script>
</head>
</html>
