<?php
require_once("individualbooks.php");
$books = book::getbook();
if ($books) {
  foreach ($books as $book) {
     $book_title = $book->book_title;
     echo "$book_title<br>";
  }
} else {
  echo "<h2>No books found.</h2>";
}
?>
