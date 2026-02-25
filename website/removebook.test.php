<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

error_log('$_POST ' . print_r($_POST, true));
require_once("individualbooks.php");
$book_id = $_POST['book_id'];
if ((trim($book_id) == '') or (!is_numeric($book_id))) {
 echo "<h2>Enter a valid ID</h2>\n";
} else if (!book::findbook($book_id)) {
 echo "<h2>#$book_id does not exist</h2>\n";

} else {
 $book = book::findbook($book_id);
 $result = $book->removebook();
 if ($result)
   echo "<h2>Book $book_id removed</h2>\n";
 else
   echo "<h2>Could not remove $book_id</h2>\n";
}
// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
?>