<?php
    session_start();
    $_SESSION['test'] = "Das ist ein Test und sollte dargestellt werden.";
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
    <head>
        <meta charset="UTF-8"></meta>
        <title>Login</title>
    </head>
    <body>
        <form action="mobilemenu.php">
            <input type="submit" value="Anmelden" />
        </form>
    </body>
</html>

