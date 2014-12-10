<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $_SESSION['angemeldet'] = true;
    $_SESSION['id'] = $id;

    // Weiterleitung zur geschützten Startseite
    if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
        if (php_sapi_name() == 'cgi') {
            header('Status: 303 See Other');
        } else {
            header('HTTP/1.1 303 See Other');
        }
    }

    header('Location: http://' . $hostname . ($path == '/' ? '' : $path) . '/mobilestart.html');
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
 <head>
  <title>Geschützter Bereich</title>
 </head>
 <body>
     <form action="mobilemenu.php" method="post">
   <input type="submit" value="Anmelden" />
  </form>
 </body>
</html>

