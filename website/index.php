<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

session_start();
require_once("bookgenre.php");
require_once("individualbooks.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inventory Helper</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <script src="realtime.js"></script>
    </head>
    
    <body onload="getRealTime(); setInterval(getRealTime, 5000);">
        <header>
            <?php include("header.inc.php"); ?>
        </header>
                    <?php if (isset($_SESSION['login'])) { ?>
            <aside>
                <?php include("aside.inc.php"); ?>
                <script>
                    getRealTime();
                    setInterval(getRealTime, 5000);
                </script>
            </aside>
            <?php } ?>
        <section>
            <nav>
                <?php include("nav.inc.php"); ?>
            </nav>
            <main>
                <?php
                if (isset($_REQUEST['content'])) {
                    include($_REQUEST['content'] . ".inc.php");
                } else {
                    include("main.inc.php");
                }
                ?>
            </main>
        </section>
        <footer>
            <?php include("footer.inc.php"); ?>
        </footer>
    </body>
</html>