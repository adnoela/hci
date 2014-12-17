<?php
session_start();
$myfile = fopen("status.txt", "r");
$_SESSION['currentpage'] = fgets($myfile);
fclose($myfile);
//$myfile = fopen("status.txt", )
?>