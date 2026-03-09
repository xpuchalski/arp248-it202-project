<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
if (!isset($_REQUEST['book_id']) or (!is_numeric($_REQUEST['book_id']))) {
?>
 <h2>You did not select a valid book ID to view.</h2>
 <a href="index.php?content=listbooks">List Books</a>
 <?php
} else {
 $bookID = $_REQUEST['book_id'];
 $book = book::findBook($bookID);
  if($book) {
    echo "<p>Book ID: $book->book_id</p>" .
      "<p>Title: $book->book_title</p>\n" .
      "<p>Code: $book->book_code</p>\n" .
      "<p>Description: $book->book_description</p>\n" .
      "<p>Author: $book->book_author</p>\n" .
      "<p>Genre: $book->book_genre</p>\n";
      "<p>Buy Price: $book->book_buy_price</p>\n" .
      "<p>Sell Price: $book->book_sell_price</p>\n";
  }
 
  else if (!$book) {
   echo "<h2>There are no books for  with this ID</h2>\n";
  }
  else {
   echo "<h2>Sorry, category $categoryID not found</h2>\n";
 }
}
?>