<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("bookgenre.php");
$genres = Genre::getGenres();
if ($genres) {
  foreach ($genres as $genre) {
     $genreName = $genre->genreName;
     echo "$genreName <br> ";
  }
} else {
  echo "<h2>No genres found.</h2>";
}
?>
