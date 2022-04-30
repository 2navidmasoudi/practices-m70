-- @block
DROP DATABASE test;

-- @BLOCK
CREATE DATABASE Maktab;

-- @BLOCK
-- @BLOCK
USE Maktab;
-- @block
CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    bio TEXT,
    country VARCHAR(2)
);
-- @block
INSERT INTO Users (email, bio, country)
VALUES ("example@gmail.com", "Navidam", "IR"),
    ("example2@gmail.com", "Mamadam", "IR"),
    ("example3@gmail.com", "Aminam", "US");

-- @BLOCK
SELECT * FROM Users;