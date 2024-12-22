CREATE DATABASE auction_site;

USE auction_site;

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    starting_price DECIMAL(10, 2) NOT NULL,
    auction_end DATETIME,
    current_bid DECIMAL(10, 2) DEFAULT 0,
    current_bidder_id INT DEFAULT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255)
);

INSERT INTO items (name, description, starting_price, auction_end)
VALUES ('Sample Item', 'This is a sample auction item.', 100.00, '2024-12-30 10:00:00');
