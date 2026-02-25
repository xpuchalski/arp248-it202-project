USE books;
CREATE TABLE book_genres (
 genre_id       INT            NOT NULL,
 genre_code     VARCHAR(10)    NOT NULL,
 genre_name     VARCHAR(255)   NOT NULL,
 date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (genre_id)
);

INSERT INTO book_genres (genre_id, genre_code, genre_name) VALUES

(1, 'FIC', 'Fiction'),
(2, 'MYS', 'Mystery'),
(3, 'TXT', 'Textbook');

DROP TABLE books.book_genres;

SELECT * FROM book_genres;