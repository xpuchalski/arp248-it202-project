<?php // Alexander Puchalski, arp248, IT202-project, 2026-02-10
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
}
header("Location: index.php");
?>
