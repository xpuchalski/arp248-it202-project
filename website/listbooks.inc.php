<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("individualbooks.php");
$books = book::getbook();
if ($books) {
?>
 <h2>Select Book</h2>
  <form name="books" method="post">
   <select name="bookID" size="20">
       <?php
       $first = true;
       foreach ($books as $book) {
           $bookID = $book->book_id;
           $bookCode = $book->book_code;
           $bookTitle = $book->book_title;
           $bookDescription = $book->book_description;
           $bookAuthor = $book->book_author;
           $bookGenre = $book->book_genre;
           $bookPrice = $book->book_sell_price;
           $option = $bookID . " - " . $bookTitle .  " - " . $bookPrice;
           if($first) {
                echo "<option value=\"$bookID\" selected>$option</option>\n";
                $first = false;
           } else {
                echo "<option value=\"$bookID\">$option</option>\n";
           }
       }
       ?>
   </select>
 </form>
<?php
} else {
  echo "<h2>No items found.</h2>";
}
?>