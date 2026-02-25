# Alexander Puchalski, arp248, IT202-project, 2026-02-10
CREATE DATABASE books;
CREATE USER 'admin_user'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON books.* TO 'admin_user'@'localhost';
USE books;
CREATE TABLE book_users (
    book_user_id INT NOT NULL AUTO_INCREMENT,
    email_address VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    pronouns VARCHAR(60) NOT NULL,
    first_name VARCHAR(60) NOT NULL,
    last_name VARCHAR(60) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (book_user_id)
);
INSERT INTO book_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('xpucha@books.com', SHA2('password', 256),'He/Him', 'alex', 'pucha','887-9075');
INSERT INTO book_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('radachi@books.com', SHA2('password', 256),'She/It', 'rei', 'adachi','123-5555');
INSERT INTO book_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('hkoch@books.com', SHA2('password', 256),'She/Her', 'honey', 'koch','416-8888');
SELECT * FROM book_users;
