<?php
require_once('database.php');
class genre
{
    public $genreID;
    public $genreCode;
    public $genreName;
    function __construct($genreID, $genreCode, $genreName)
    {
        $this->genreID = $genreID;
        $this->genreCode = $genreCode;
        $this->genreName = $genreName;
    }
    function __toString()
    {
        $output = "<h2>$this->genreID - $this->genreCode, $this->genreName</h2>\n";
        return $output;
    }
    static function findGenre($genreID)
    {
        $db = getDB();
        $query = "SELECT * FROM book_genres WHERE genre_id = $genreID";
        $result = $db->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row) {
            $genre = new genre(
                $row['genre_id'],
                $row['genre_code'],
                $row['genre_name']
            );
            $db->close();
            return $genre;
        } else {
            $db->close();
            return NULL;
        }
    }
    function saveGenre()
    {
        $db = getDB();
        $query = "INSERT INTO book_genres (genre_id, genre_code, genre_name) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "iss",
            $this->genreID,
            $this->genreCode,
            $this->genreName
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }
        static function getGenres()
    {
        $db = getDB();
        $query = "SELECT * FROM book_genres";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $genres = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $genre = new genre(
                    $row['genre_id'],
                    $row['genre_code'],
                    $row['genre_name']
                );
                array_push($genres, $genre);
                unset($genre);
            }
            $db->close();
            return $genres;
        } else {
            $db->close();
            return NULL;
        }
    }

    function removeGenre()
    {
        $db = getDB();
        $query = "DELETE FROM book_genres WHERE genre_id = $this->genreID";
        $result = $db->query($query);
        $db->close();
        return $result;
    }
    function updateGenre()
   {
       $db = getDB();
       $query = "UPDATE book_genres SET genre_code = ?, " .
           "genre_name = ? " .
           "WHERE genre_id = $this->genreID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "ss",
           $this->genreCode,
           $this->genreName
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }

}
?>
