<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

require_once("bookgenre.php");
$genreID = $_POST['genreID'] ?? '';
if ((trim($genreID) == '') or (!is_numeric($genreID))) {
  echo "<h2>Enter a valid genre ID</h2>\n";
} else if (!Genre::findGenre($genreID)) {
  echo "<h2>#$genreID does not exist</h2>\n";
} else {
  $answer = $_POST['answer'] ?? '';
  if ($answer == "Update Genre") {
    $genre = Genre::findGenre($genreID);
    $genre->genreID = $_POST['genreID'];
    $genre->genreCode = htmlspecialchars($_POST['genreCode']);
    $genre->genreName = htmlspecialchars($_POST['genreName']);
    $result = $genre->updateGenre();
    if ($result) {
      echo "<h2>Genre $genreID updated</h2>\n";
    } else {
      echo "<h2>Stopped updating $genreID</h2>\n";
    }
  } else if ($answer == "Delete Genre") {
    $genre = Genre::findGenre($genreID);
    $result = $genre->removeGenre();
    if ($result) {
      echo "<h2>Genre #$genreID removed</h2>\n";
    } else {
      echo "<h2>Could not remove genre #$genreID</h2>\n";
    }
  } else {
    echo "<h2>Update Canceled for genre #$genreID</h2>\n";
  }
}
?>