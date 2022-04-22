-- @BLOCK
CREATE DATABASE Maktab;
-- @BLOCK
SHOW DATABASES;
-- @BLOCK
USE Maktab;
-- @BLOCK
DROP TABLE Students,
Marks;
-- @BLOCK
CREATE TABLE Students(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
-- @BLOCK
ALTER TABLE Students
ADD age INT;
-- @BLOCK
CREATE TABLE Marks(
    id INT NOT NULL AUTO_INCREMENT,
    quiz INT NOT NULL,
    homework INT NOT NULL,
    PRIMARY KEY (id)
);
-- @BLOCK
ALTER TABLE Marks
ADD student_id INT NOT NULL,
    ADD FOREIGN KEY (student_id) REFERENCES Students(id);
-- @BLOCK
INSERT INTO Students (name, age)
VALUES ("Navid", 27),
    ("Hasan", 25),
    ("Amin", 22),
    ("Hossein", NULL),
    ("Hossein", 33);
-- @BLOCK
INSERT INTO Students (name, age)
VALUES ("Ali", 99);
-- @BLOCK
SELECT *
FROM Students;
-- @BLOCK
SELECT DISTINCT name
FROM Students;
-- @BLOCK
SELECT *
FROM Students
WHERE Age < 30
    AND name = "Amin";