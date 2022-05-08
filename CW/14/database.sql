-- @block
CREATE DATABASE todo;
-- @block
USE todo;
-- @block
CREATE TABLE todos (
    id INT NOT NULL AUTO_INCREMENT,
    task TEXT NOT NULL,
    status TINYINT DEFAULT(0),
    PRIMARY KEY (id)
);