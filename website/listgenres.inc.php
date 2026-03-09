<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("bookgenre.php");
$genres = genre::getGenres();
if ($genres) {
?>
 <h2>Select Genre</h2>
  <form name="genres" method="post">
   <select name="genreID" size="20">
       <?php
       $first = true;
       foreach ($genres as $genre) {
           $genreID = $genre->genreID;
           $name = $genreID . " - " . $genre->genreCode . ", " . $genre->genreName;
           if($first) {
                echo "<option value=\"$genreID\" selected>$name</option>\n"; 
                $first = false;
           } else {
                echo "<option value=\"$genreID\">$name</option>\n";
           }
       }
       ?>
   </select>
  </form>
<?php
} else {
  echo "<h2>No genres found.</h2>";
}
?>