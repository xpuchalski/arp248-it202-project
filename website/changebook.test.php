<?php
require_once("individualbooks.php");
$book_id = $_POST['book_id'];
if ((trim($book_id) == '') or (!is_numeric($book_id))) {
  echo "<h2>Enter a valid book ID</h2>\n";
} else if (!book::findbook($book_id)) {
  echo "<h2>#$book_id does not exist</h2>\n";
} else {
  $book = book::findbook($book_id);
  $book->book_id = $_POST['book_id'];
  $book->book_code = $_POST['book_code'];
  $book->book_title = $_POST['book_title'];
  $book->book_description = $_POST['book_description'];
  $book->book_author = $_POST['book_author'];
  $book->book_genre = $_POST['book_genre'];
  $book->book_genre_id = $_POST['book_genre_id'];
  $book->book_buy_price = $_POST['book_buy_price'];
  $book->book_sell_price = $_POST['book_sell_price'];
  $result = $book->updatebook();
  if ($result) {
     echo "<h2>Book $book_id updated</h2>\n";
  } else {
     echo "<h2>Issue updating book $book_id</h2>\n";
  }
}
// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
?>