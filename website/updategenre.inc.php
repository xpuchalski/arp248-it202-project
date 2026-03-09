<?php
# Alexander Puchalski, arp248, IT202-project, 2026-02-10

if (!isset($_POST['genreID']) or (!is_numeric($_POST['genreID']))) {
?>
  <h2>You did not select a valid genreID value</h2>
  <a href="index.php?content=listgenres">List genres</a>
  <?php
} else {
  $genreID = $_POST['genreID'];
  $genre = Genre::findGenre($genreID);
  if ($genre) {
  ?>
    <h2>Update Genre <?php echo $genre->genreID; ?></h2><br>
    <form name="genres" action="index.php" method="post">
      <table>
        <tr>
          <td>Genre ID</td>
          <td><?php echo $genre->genreID; ?></td>
        </tr>
        <tr>
          <td>Genre Code</td>
          <td><input type="text" name="genreCode" value="<?php echo $genre->genreCode; ?>"></td>
        </tr>
        <tr>
          <td>Genre Name:</td>
          <td><input type="text" name="genreName" value="<?php echo $genre->genreName; ?>"></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Genre">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="genreID" value="<?php echo $genreID; ?>">
      <input type="hidden" name="content" value="changegenre">
    </form>
  <?php
  } else {
  ?>
    <h2>Sorry, genre <?php echo $genreID; ?> not found</h2>
    <a href="index.php?content=listgenres">List genres</a>
<?php
  }
}
?>