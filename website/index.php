<?php // Alexander Puchalski, arp248, IT202-project, 2026-02-10
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Inventory Helper</title></head>
<body>
   <section>
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
</body>
</html>
