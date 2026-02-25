USE books;
CREATE TABLE book_listing(
    book_id INT NOT NULL,
    book_code VARCHAR(10) NOT NULL,
    book_title VARCHAR(255) NOT NULL,
    book_description TEXT,
    book_author VARCHAR(255) NOT NULL,
    book_genre VARCHAR(255),
    book_genre_id INT DEFAULT 0,
    book_buy_price DECIMAL(10,2) NOT NULL,
    book_sell_price DECIMAL(10,2) NOT NULL,
    date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (book_id),
    FOREIGN KEY (book_genre_id) REFERENCES books.book_genres(genre_id) ON DELETE SET NULL ON UPDATE CASCADE
);
INSERT INTO book_listing (book_id, book_code, book_title, book_description, book_author, book_genre, book_genre_id, book_buy_price, book_sell_price) VALUES
(1,'B001', 'The Great Gatsby', 'A novel set in the Roaring Twenties.', 'F. Scott Fitzgerald', 'Fiction', 1, 10.00, 15.00),
(2,'B002', 'The Hound of the Baskervilles', 'A mystery novel featuring Sherlock Holmes.', 'Arthur Conan Doyle', 'Mystery', 2, 8.00, 12.00),
(3,'B003', 'Introduction to Algorithms', 'A comprehensive textbook on algorithms.', 'Thomas H. Cormen', 'Textbook', 3, 50.00, 75.00);

SELECT * FROM book_listing;