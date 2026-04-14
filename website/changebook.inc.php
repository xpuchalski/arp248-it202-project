<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("individualbooks.php");
if (isset($_SESSION['login'])) {
  $book_id = $_POST['book_id'] ?? $_POST['bookID'] ?? '';
  if ((trim($book_id) == '') or (!is_numeric($book_id))) {
    echo "<h2>Enter a valid book ID</h2>\n";
  } else if (!book::findbook($book_id)) {
    echo "<h2>A book with ID #$book_id does not exist</h2>\n";
  } else {
    $answer = $_POST['answer'];
    if ($answer == "Update Book") {
      $book = book::findbook($book_id);
      $book->book_id = $_POST['book_id'] ?? $_POST['bookID'] ?? $book_id;
      $book->book_code = $_POST['book_code'];
      $book->book_title = $_POST['book_title'];
      $book->book_description = $_POST['book_description'];
      $book->book_author = $_POST['book_author'];
      $postedGenreId = $_POST['book_genre_id'] ?? $_POST['genreID'] ?? null;
      if ($postedGenreId !== null && is_numeric($postedGenreId)) {
        $book->book_genre_id = $postedGenreId;
        $genre = Genre::findGenre($postedGenreId);
        if ($genre) {
          $book->book_genre = $genre->genreName;
        }
      }
      $book->book_buy_price = $_POST['book_buy_price'];
      $book->book_sell_price = $_POST['book_sell_price'];
      $result = $book->updatebook();
      if ($result) {
        echo "<h2>Book #$book_id updated</h2>\n";
      } else {
        echo "<h2>Stopped updating book #$book_id</h2>\n";
      }
    } else if ($answer == "Delete Book") {
        $book = book::findbook($book_id);
        $result = $book->removebook();
        if ($result) {
          echo "<h2>Book #$book_id removed</h2>\n";
        } else {
          echo "<h2>Could not remove book #$book_id</h2>\n";
        }
    } else {
      echo "<h2>Update Canceled for book #$book_id</h2>\n";
    }
  }
} else {
  echo "<h2>login first</h2>\n";
}
// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
?>