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
 if ($book) {
   $books = book::getBooksByGenre($book->book_genre_id);
   if ($books) {
 ?>
     <br><br>
     <b>Books:</b><br>
     <table>
       <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Code</th>
        <th>Description</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Price</th>
       </tr>
       <?php
       $booktotal = 0;
       foreach ($books as $book) {
       ?>
         <tr>
           <td><?php echo $book->book_id; ?></td>
           <td><?php echo $book->book_title; ?></td>
           <td><?php echo $book->book_code; ?></td>
           <td><?php echo $book->book_description; ?></td>
           <td><?php echo $book->book_author; ?></td>
           <td><?php echo $book->book_genre; ?></td>
           <td><?php echo '$' . number_format($book->book_sell_price, 2); ?></td>
         </tr>
       <?php
         $booktotal = $booktotal + $book->book_sell_price;
       }
       ?>
       <tr>
         <td></td>
         <td>Total</td>
         <td><?php echo '$' . number_format($booktotal, 2); ?></td>
       </tr>
     </table>
<?php
   } else {
     echo "<h2>There are no items for this category</h2>\n";
   }
 } else {
   echo "<h2>Sorry, category $categoryID not found</h2>\n";
 }
}
?>