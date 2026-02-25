<?php
require_once('database.php');
class book
{
   public $book_id, $book_code, $book_title, $book_description, $book_author, $book_genre, $book_genre_id, $book_buy_price, $book_sell_price;
   function __construct(
        $book_id,
        $book_code,
        $book_title,
        $book_description,
        $book_author,
        $book_genre,
        $book_genre_id,
        $book_buy_price,
        $book_sell_price
       ) {
       $this->book_id = $book_id;
       $this->book_code = $book_code;
       $this->book_title = $book_title;
       $this->book_description = $book_description;
       $this->book_author = $book_author;
       $this->book_genre = $book_genre;
       $this->book_genre_id = $book_genre_id;
       $this->book_buy_price = $book_buy_price;
       $this->book_sell_price = $book_sell_price;
   }
   static function findbook($book_id)
   {
       $db = getDB();
       $query = "SELECT * FROM book_listing WHERE book_id = $book_id";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $book = new book(
               $row['book_id'],
               $row['book_code'],
               $row['book_title'],
               $row['book_description'],
               $row['book_author'],
               $row['book_genre'],
               $row['book_genre_id'],
               $row['book_buy_price'],
               $row['book_sell_price']
           );
           $db->close();
           return $book;
       } else {
           $db->close();
           return NULL;
       }
   }
   function bookToString()
   {
       $output = "<h2>Book ID: $this->book_id</h2>" .
           "<h2>Title: $this->book_title</h2>\n";
       "<h2>Genre: $this->book_genre at $this->book_buy_price</h2>\n";
       return $output;
   }
   function savebook()
   {
       $db = getDB();
       $query = "INSERT INTO book_listing (book_id, book_code, book_title, book_description, book_author, book_genre, book_genre_id, book_buy_price, book_sell_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "isssssidd",
           $this->book_id,    
           $this->book_code,   
           $this->book_title, 
           $this->book_description,  
           $this->book_author,
           $this->book_genre,
           $this->book_genre_id,
           $this->book_buy_price,
           $this->book_sell_price
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
    static function getbook()
   {
       $db = getDB();
       $query = "SELECT * FROM book_listing";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $books = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $book = new book(
                   $row['book_id'],
                   $row['book_code'],
                   $row['book_title'],
                   $row['book_description'],
                   $row['book_author'],
                   $row['book_genre'],
                   $row['book_genre_id'],
                   $row['book_buy_price'],
                   $row['book_sell_price']
               );
               array_push($books, $book);
           }
           $db->close();
           return $books;
       } else {
           $db->close();
           return NULL;
       }
   }

   function removebook()
   {
       $db = getDB();
       $query = "DELETE FROM book_listing WHERE book_id = $this->book_id";
       $result = $db->query($query);
       $db->close();
       return $result;
   }

   function updatebook()
   {
       $db = getDB();
       $query = "UPDATE book_listing SET book_id = ?, book_code = ?, book_title = ?, book_description = ?, book_author = ?, book_genre = ?, book_genre_id = ?, book_buy_price = ?, book_sell_price = ? WHERE book_id = $this->book_id";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "isssssidd",
           $this->book_id,    
           $this->book_code,   
           $this->book_title, 
           $this->book_description,  
           $this->book_author,
           $this->book_genre,
           $this->book_genre_id,
           $this->book_buy_price,
           $this->book_sell_price,
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
}
?>