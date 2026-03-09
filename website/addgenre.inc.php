
<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("bookgenre.php");
if (isset($_SESSION['login'])) {
  $genreID = $_POST['genreID'];
  if ((trim($genreID) == '') or (!is_numeric($genreID))) {
    echo "<h2>enter a valid genre ID number</h2>\n";
  } else if (Genre::findGenre($genreID)) {
    echo "<h2>A genre with the ID #$genreID already exists</h2>\n";
  } else {
    $genreCode = $_POST['genreCode'];
    $genreName = $_POST['genreName'];
    $genre = new Genre($genreID, $genreCode, $genreName);
    $result = $genre->saveGenre();
    if ($result) {
      echo "<h2>Genre #$genreID added</h2>\n";
    } else {
      echo "<h2>there was a problem adding that genre</h2>\n";
    }
  }
} else {
  echo "<h2>log in</h2>\n";
}