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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <link rel="stylesheet" type="text/css" href="ajaxtabs/ajaxtabs.css" />

        <script type="text/javascript" src="ajaxtabs/ajaxtabs.js">

            /***********************************************
             * Ajax Tabs Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
             * This notice MUST stay intact for legal use
             * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
             ***********************************************/

        </script>

    </head>

    <body>

        <ul id="countrytabs" class="shadetabs">
            <li><a href="login.php" rel=countrycontainer">Quiz</a></li>
            <li><a href="mobilestart.html" rel="countrycontainer">Foto</a></li>
            <li><a href="external3.htm" rel="countrycontainer">Tab 3</a></li>
            <li><a href="external4.htm" rel="#iframe">Tab 4</a></li>
            <li><a href="http://www.dynamicdrive.com">Dynamic Drive</a></li>
        </ul>

        <div id="countrydivcontainer" style="border:1px solid gray; margin-bottom: 1em; padding: 10px">
            <p>This is some default tab content, embedded directly inside this space and not via Ajax. It can be shown when no tabs are automatically selected, or associated with a certain tab, in this case, the first tab.</p>
        </div>

        <script type="text/javascript">

            var countries = new ddajaxtabs("countrytabs", "countrydivcontainer")
            countries.setpersist(true)
            countries.setselectedClassTarget("link") //"link" or "linkparent"
            countries.init()

        </script>

        <p><a href="javascript: countries.expandit(3)">Dynamically select last Tab</a> | <a href="demo.htm?countrytabs=1">Reload page and select 2nd tab using URL parameter</a></p>

        <hr />

    </body>
</html>