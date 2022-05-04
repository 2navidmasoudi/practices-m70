-- @block
CREATE DATABASE CHAT;
-- @block
USE CHAT;
-- @block
CREATE TABLE Users (
    username VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    name VARCHAR(32) NOT NULL,
    admin TINYINT,
    default_picture_id INT,
    PRIMARY KEY (username)
);
-- @block
CREATE TABLE Pictures (
    id INT NOT NULL AUTO_INCREMENT,
    path VARCHAR(255) NOT NULL,
    type VARCHAR(10) NOT NUll,
    PRIMARY KEY (id)
);
-- @block
CREATE TABLE Chats (
    id INT NOT NULL AUTO_INCREMENT,
    message TEXT,
    sender VARCHAR(32) NOT NULL,
    picture_id INT,
    deleted TINYINT,
    edited TINYINT,
    created_date DATETIME,
    edited_date DATETIME,
    deleted_date DATETIME,
    PRIMARY KEY (id),
    FOREIGN KEY (sender) REFERENCES Users(username),
    FOREIGN KEY (picture_id) REFERENCES Pictures(id)
) ENGINE = INNODB;
-- @block
CREATE TABLE user_picture (
    sender VARCHAR(32) NOT NULL,
    picture_id INT NOT NULL,
    PRIMARY KEY (sender, picture_id),
    FOREIGN KEY (sender) REFERENCES Users(username),
    FOREIGN KEY (picture_id) REFERENCES Pictures(id)
);
-- @BLOCK
ALTER TABLE Users -- ADD FOREIGN KEY (default_picture_id) REFERENCES user_picture(picture_id) ON DELETE CASCADE;
    -- ADD password VARCHAR(255) NOT NULL,
    -- ADD bio TEXT;
ADD token VARCHAR(255) NOT NULL;