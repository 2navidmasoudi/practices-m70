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
VALUES ("Mamali", 22);
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
    AND name LIKE "%ali%";
-- @BLOCK
SELECT name
FROM Students
WHERE id BETWEEN 3 AND 6;
-- @BLOCK
SELECT *
FROM Students
ORDER BY name ASC;
-- @BLOCK
SELECT *
FROM Students
WHERE age IS NOT NULL
ORDER BY age DESC;
-- @BLOCK
SELECT MIN(age) as min_age,
    AVG(age) as average_age,
    MAX(age) as max_age
FROM Students;
-- @BLOCK
INSERT INTO Marks (quiz, homework, student_id)
VALUES (80, 70, 2),
    (20, 80, 3),
    (30, 40, 5);
-- @BLOCK
SELECT *
FROM Students
    INNER JOIN Marks ON Students.id = Marks.student_id
WHERE Students.id = 2;
-- @BLOCK
UPDATE Marks
SET quiz = 15,
    homework = 30
WHERE student_id = 2;
-- @BLOCK
SELECT *
FROM Marks;
-- @BLOCK
CREATE TABLE Mentors(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    age INT,
    PRIMARY KEY (id)
);
-- @BLOCK
CREATE TABLE mentor_student(
    id INT NOT NULL AUTO_INCREMENT,
    student_id INT,
    mentor_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (student_id) REFERENCES Students(id),
    FOREIGN KEY (mentor_id) REFERENCES Mentors(id)
);
-- @BLOCK
INSERT INTO Mentors (name, age)
VALUES ("Sadeghi", 25),
    ("Sohrabi", 30),
    ("Shabani", 24);
-- @BLOCK
INSERT INTO mentor_student(student_id, mentor_id)
VALUES (null, 2),
    (6, null);
-- @BLOCK
SELECT *
FROM mentor_student;
-- @BLOCK
SELECT Mentors.name,
    Students.name
FROM Mentors
    INNER JOIN mentor_student on Mentors.id = mentor_student.mentor_id
    RIGHT JOIN Students on Students.id = mentor_student.student_id;
-- @BLOCK
SELECT Students.name,
    Mentors.name
FROM Students
    INNER JOIN mentor_student on Students.id = mentor_student.student_id
    INNER JOIN Mentors on Mentors.id = mentor_student.mentor_id;
-- @BLOCK
CREATE TABLE mentor_student(
    id INT NOT NULL AUTO_INCREMENT,
    student_id INT,
    mentor_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (student_id) REFERENCES Students(id),
    FOREIGN KEY (mentor_id) REFERENCES Mentors(id)
);