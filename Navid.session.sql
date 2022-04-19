-- @block
DROP DATABASE test;
-- @BLOCK
CREATE DATABASE Maktab;
-- @BLOCK
-- @BLOCK
USE test;
-- @block
CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    bio TEXT,
    country VARCHAR(2)
);
-- @block
INSERT INTO Users (email, bio, country)
VALUES ("example5@gmail.com", "Mamadam", "IR");
-- @BLOCK
SELECT *
FROM Users;