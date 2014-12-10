<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $_SESSION['angemeldet'] = true;

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    header('Location: http://' . $hostname . ($path === '/hci/' ? '' : $path) . '/mobilemenu.php');
    exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="mobilemenu.php" method="post">
            <input type="submit" value="Anmelden" />
        </form>
    </body>
</html>

