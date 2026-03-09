<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once('individualbooks.php');
if (isset($_SESSION['login'])) {
  $book_id = $_POST['book_id'];
  if ((trim($book_id) == '') or (!is_numeric($book_id))) {
    echo "<h2>Enter book ID number</h2>\n";
  } else if (book::findBook($book_id)) {
    echo "<h2>A book with the ID #$book_id already exists</h2>\n";
  } else {
    $book_code = $_POST['book_code'];
    $book_title = $_POST['book_title'];
    $book_description = $_POST['book_description'];
    $book_author = $_POST['book_author'];
    $book_genre = $_POST['book_genre'];
    $book_genre_id = $_POST['book_genre_id'];
    $book_buy_price = $_POST['book_buy_price'];
    $book_sell_price = $_POST['book_sell_price'];
    $book = new book($book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price);
    $result = $book->savebook();
    if ($result)
      echo "<h2>Book #$book_id added</h2>\n";
    else
      echo "<h2>there was a problem adding that book</h2>\n";
  }
} else {
  echo "<h2>login first</h2>\n";
}
// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
?>
