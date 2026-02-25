<?php
error_log('$_POST ' . print_r($_POST, true));
require_once("bookgenre.php");
$genreID = $_POST['genreID'];
if ((trim($genreID) == '') or (!is_numeric($genreID))) {
 echo "<h2>Enter a valid genreID</h2>\n";
} else if (!Genre::findGenre($genreID)) {
 echo "<h2>#$genreID does not exist</h2>\n";

} else {
 $genre = Genre::findGenre($genreID);
 $result = $genre->removeGenre();
 if ($result)
   echo "<h2>Genre $genreID removed</h2>\n";
 else
   echo "<h2>Could not remove $genreID</h2>\n";
}
?>