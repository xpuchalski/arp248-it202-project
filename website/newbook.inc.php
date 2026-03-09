<h2>Enter New Book Information</h2>
<!-- Alexander Puchalski, arp248, IT202-project, 2026-02-10 -->

<form name="newbook" action="index.php" method="post">
    <table cellpadding="1" border="0">
        <tr>
            <td>Book ID:</td>
            <td><input type="text" name="book_id" size="4"></td>
        </tr>
        <tr>
            <td>Book Code:</td>
            <td><input type="text" name="book_code" size="20"></td>
        </tr>
        <tr>
            <td>Book Title:</td>
            <td><input type="text" name="book_title" size="20"></td>
        </tr>
        <tr>
            <td>Book Description:</td>
            <td><input type="text" name="book_description" size="20"></td>
        </tr>
        <tr>
            <td>Book Author:</td>
            <td><input type="text" name="book_author" size="20"></td>
        </tr>
        <tr>
            <td>Genre:</td>
            <td><select name="genreID">
                    <?php
                    echo "<option value=\"0\">Select a Genre</option>\n";
                    $genres = genre::getGenres();
                    if ($genres)
                        foreach ($genres as $genre) {
                            $genreID = $genre->genreID;
                            $genreName = $genre->genreName;
                            echo "<option value=\"$genreID\">$genreName</option>\n";
                        }
                    ?></td>
        </tr>
        <tr>
            <td>Sell Price:</td>
            <td><input type="text" name="book_sell_price" size="10"></td>
        </tr>
                <tr>
            <td>Buy Price:</td>
            <td><input type="text" name="book_buy_price" size="10"></td>
        </tr>
    </table><br>
    <input type="submit" value="Submit New Book">
    <input type="hidden" name="content" value="addbook">
</form>