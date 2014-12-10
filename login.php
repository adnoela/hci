<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $_SESSION['angemeldet'] = true;
    //$_SESSION['id'] = $id;

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    // Weiterleitung zur geschützten Startseite
    if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
        if (php_sapi_name() == 'cgi') {
            header('Status: 303 See Other');
        } else {
            header('HTTP/1.1 303 See Other');
        }
    }

    header('Location: http://' . $hostname . ($path === '/hci/' ? '' : $path) . '/mobilemenu.html');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="login.php" method="post">
            <input type="submit" value="Anmelden" />
        </form>
        <?php
        echo $hostname . ($path === '/hci/' ? '' : $path) . '/mobilemenu.html';
        ?>
    </body>
</html>

