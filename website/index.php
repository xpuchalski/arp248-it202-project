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
    </head>
    <body>
        <header>
            <?php include("header.inc.php"); ?>
        </header>
        <section style="height: 425px;">
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