<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
if (!isset($_POST['book_id']) or (!is_numeric($_POST['book_id']))) {
?>
  <h2>You did not select a valid book ID value</h2>
  <a href="index.php?content=listbooks">List books</a>
  <?php
} else {
  $bookID = $_POST['book_id'];
  $book = Book::findBook($bookID);
  if ($book) {
  ?>
    <h2>Update Book <?php echo $book->book_id; ?></h2><br>
    <form name="books" action="index.php" method="post">
      <table>
        <tr>
          <td>Book ID</td>
          <td><?php echo $book->book_id; ?></td>
        </tr>
        <tr>
          <td>Book Code</td>
          <td><input type="text" name="book_code" value="<?php echo $book->book_code; ?>"></td>
        </tr>
        <tr>
          <td>Book Title</td>
          <td><input type="text" name="book_title" value="<?php echo $book->book_title; ?>"></td>
        </tr>
        <tr>
          <td>Book Description</td>
          <td><input type="text" name="book_description" value="<?php echo $book->book_description; ?>"></td>
        </tr>
        <tr>
          <td>Book Author</td>
          <td><input type="text" name="book_author" value="<?php echo $book->book_author; ?>"></td>
        </tr>
        <tr></tr>
          <td>Genre:</td>
          <td><select name="genreID">
              <?php
              echo "<option value=\"0\">Select a Genre</option>\n";
              $genres = Genre::getGenres();
              if ($genres)
                foreach ($genres as $genre) {
                  $genreID = $genre->genreID;
                  $selected = $genreID == $book->book_genre_id ? "selected" : "";
                  echo "<option value=\"$genreID\" $selected>$genre->genreName</option>\n";
                }
              ?></td>
        </tr>
        <tr>
          <td>Sell Price</td>
          <td><input type="text" name="book_sell_price" value="<?php echo $book->book_sell_price; ?>"></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Book">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="bookID" value="<?php echo $bookID; ?>">
      <input type="hidden" name="content" value="changebook">
    </form>
  <?php
  } else {
  ?>
    <h2>Sorry, book <?php echo $bookID; ?> not found</h2>
    <a href="index.php?content=listbooks">List books</a>
<?php
  }
}
?>