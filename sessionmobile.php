<?php
session_start();
$myfile = fopen("status.txt", "r");
$_SESSION['currentpage'] = fgets("status.txt");
$_SESSION['drawing'] = FALSE;
fclose($myfile);
?>