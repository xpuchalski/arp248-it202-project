  <?php
  # Alexander Puchalski, arp248, IT202-project, 2026-02-10

   if (isset($_SESSION['login'])) {
   ?>
    <div class="navigation">
      <table width="100%" cellpadding="3">
        <style>
          img {
            padding: 5px;
            height: 25px;
            width: 25px ;
          }
        </style>

        <?php
         echo "<td><h3>Welcome, {$_SESSION['login']}</h3></td>";
         ?>
        <tr>
          <td><a href="index.php"><strong>Home</strong></a></td>
        </tr>
        <tr>
          <td><img src="images/categories.png"><strong>Categories</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listgenres">
              <strong>List Genres</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newgenre">
              <strong>Add New Genre</strong></a></td>
        </tr>
        <tr>
          <td><img src="images/books.png"><strong>Books</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listbooks">
              <strong>List Books</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newbook">
              <strong>Add New Book</strong></a></td>
        </tr>
        <tr>
          <td>
            <hr />
          </td>
        </tr>
        <tr>
          <td><a href="index.php?content=logout">
              <strong>Logout</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Update Book:</label><br>
              <input type="text" name="book_id" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="updatebook" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Update Genre:</label><br>
              <input type="text" name="genreID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="updategenre" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Genre:</label><br>
              <input type="text" name="genreID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="displaygenre" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Book:</label><br>
              <input type="text" name="book_id" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="displaybook" />
            </form>
          </td>
        </tr>
      </table>
    </div>
  <?php
   }
   ?>