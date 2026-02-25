<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("individualbooks.php");
$books = book::getbook();
if ($books) {
  foreach ($books as $book) {
     $book_title = $book->book_title;
     echo "$book_title <br> ";
  }
} else {
  echo "<h2>No books found.</h2>";
}
?>
