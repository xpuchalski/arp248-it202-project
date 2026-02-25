# Alexander Puchalski, arp248, IT202-project, 2026-02-10

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

INSERT INTO book_listing (book_id, book_code, book_title, book_description, book_author, book_genre, book_genre_id, book_buy_price, book_sell_price) VALUES
(4, 'B004', 'To Kill a Mockingbird', 'A novel about racial injustice in the Deep South.', 'Harper Lee', 'Fiction', 1, 12.00, 18.00),
(5, 'B005', '1984', 'A dystopian novel about totalitarianism.', 'George Orwell', 'Fiction', 1, 9.00, 14.00),
(6, 'B006', 'The Catcher in the Rye', 'A novel about teenage rebellion and angst.', 'J.D. Salinger', 'Fiction', 1, 11.00, 16.00),
(7, 'B007', 'Pride and Prejudice', 'A classic novel about love and social class.', 'Jane Austen', 'Fiction', 1, 10.00, 15.00),
(8, "B008", "And Then There Were None", "A mystery novel by Agatha Christie.", "Agatha Christie", "Mystery", 2, 7.00, 10.00),
(9, "B009", "The Great Alone", "A novel about survival in the Alaskan wilderness.", "Kristin Hannah", "Mystery", 2, 12.00, 18.00),
(10, "B010", "The Silent Patient", "A psychological thriller about a woman's act of violence.", "Alex Michaelides", "Mystery", 2, 9.00, 14.00),
(11, "B011", "The Alchemist", "A novel about a shepherd's journey to find treasure.", "Paulo Coelho", "Mystery", 2, 10.00, 15.00),
(12, "B012", "C++ For Dummies", "A beginner's guide to C++ programming.", "Stephen R. Davis", "Textbook", 3, 30.00, 45.00),
(13, "B013", "The Pragmatic Programmer", "A guide to becoming a better programmer.", "Andrew Hunt", "Textbook", 3, 40.00, 60.00),
(14, "B014", "Clean Code", "A handbook of agile software craftsmanship.", "Robert C. Martin", "Textbook", 3, 35.00, 50.00),
(15, "B015", "Design Patterns", "Elements of Reusable Object-Oriented Software.", "Erich Gamma", "Textbook", 3, 45.00, 70.00);

SELECT book_title, date_time_created, date_time_updated FROM book_listing;