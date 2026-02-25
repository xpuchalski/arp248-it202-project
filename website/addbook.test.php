<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("individualbooks.php");
$book_id = $_POST['book_id'];
if ((trim($book_id) == '') or (!is_numeric($book_id))) {
  echo "<h2>Enter book ID number</h2>\n";
} else if (book::findBook($book_id)) {
  echo "<h2>#$book_id already exists</h2>\n";
} else {
  $book_id = $_POST['book_id'];
  $book_code = $_POST['book_code'];
  $book_title = $_POST['book_title'];
  $book_description = $_POST['book_description'];
  $book_author = $_POST['book_author'];
  $book_genre = $_POST['book_genre'];
  $book_genre_id = $_POST['book_genre_id'];
  $book_buy_price = $_POST['book_buy_price'];
  $book_sell_price = $_POST['book_sell_price'];
  $book = new book($book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price);
  $result = $book->saveBook();
  if ($result) {
      echo "<h2>#$book_id added</h2>\n";
  } else {
      echo "<h2>Error adding #$book_id</h2>\n";
  }
}
// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
?>
