<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

// $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price
if (!isset($_REQUEST['genreID']) or (!is_numeric($_REQUEST['genreID']))) {
?>
 <h2>You did not select a valid genreID to view.</h2>
 <a href="index.php?content=listgenres">List Genres</a>
 <?php
} else {
 $genreID = $_REQUEST['genreID'];
 $genre = Genre::findGenre($genreID);
 if ($genre) {
   echo $genre;
   $genres = genre::getGenres($genreID);
   if ($genres) {
 ?>
     <br><br>
     <b>Genres:</b><br>
     <table>
       <tr>
        <th>Genre ID</th>
        <th>Genre Code</th>
        <th>Genre Name</th>
       </tr>
       <?php
       foreach ($genres as $genre) {
       ?>
         <tr>
           <td><?php echo $genre->genreID; ?></td>
           <td><?php echo $genre->genreCode; ?></td>
           <td><?php echo $genre->genreName; ?></td>
         </tr>
       <?php
       }
       ?>
     </table>
<?php
   } else {
     echo "<h2>There are no items for this genre</h2>\n";
   }
 } else {
   echo "<h2>Sorry, genre $genreID not found</h2>\n";
 }
}
?>