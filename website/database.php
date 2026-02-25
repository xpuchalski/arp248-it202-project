<?php // Alexander Puchalski, arp248, IT202-project, 2026-02-10

 function getDB($echo_mode = false) {
   $host = 'localhost';
   $port = 3306;
   $dbname = 'books';
   $username = 'admin_user';
   $password = 'admin';
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   try {
       $db = new mysqli($host, $username, $password, $dbname, $port);
       return $db;
   } catch (mysqli_sql_exception $e) {
       error_log("Database connection failed: " . $e->getMessage());
       if ($echo_mode) echo "Database connection failed: " . $e->getMessage();
   }
 }
 getDB(true);
?>
