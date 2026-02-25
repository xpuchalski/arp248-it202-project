<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("bookgenre.php");
$genreID = $_POST['genreID'];
if ((trim($genreID) == '') or (!is_numeric($genreID))) {
  echo "<h2>Enter valid genre ID number</h2>\n";
} else if (Genre::findGenre($genreID)) {
  echo "<h2>#$genreID already exists</h2>\n";
} else {
  $genreCode = $_POST['genreCode'];
  $genreName = $_POST['genreName'];
  $genre = new Genre($genreID, $genreCode, $genreName);
  $result = $genre->saveGenre();
  if ($result) {
      echo "<h2>#$genreID added</h2>\n";
  } else {
      echo "<h2>Error adding #$genreID</h2>\n";
  }
}
?>
