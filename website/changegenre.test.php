<?php
require_once("bookgenre.php");
$genreID = $_POST['genreID'];
if ((trim($genreID) == '') or (!is_numeric($genreID))) {
  echo "<h2>Enter a valid genre ID</h2>\n";
} else if (!Genre::findGenre($genreID)) {
  echo "<h2>#$genreID does not exist</h2>\n";
} else {
  $genre = Genre::findGenre($genreID);
  $genre->genreID = $_POST['genreID'];
  $genre->genreCode = $_POST['genreCode'];
  $genre->genreName = $_POST['genreName'];
  $result = $genre->updateGenre();
  if ($result) {
     echo "<h2>Genre $genreID updated</h2>\n";
  } else {
     echo "<h2>Issue updating genre $genreID</h2>\n";
  }
}
?>