-- @BLOCK
CREATE DATABASE Company;
-- @BLOCK
USE Company;
-- @BLOCK
-- ALTER TABLE Branches CHANGE establishment_date founding_date DATE;
-- @BLOCK
ALTER TABLE Branches DROP description;
-- @BLOCK
-- If you don't need auto id,
-- then comment id and uncomment branch_id
-- otherwise just ignore.
CREATE TABLE Branches (
    id INT NOT NULL AUTO_INCREMENT,
    -- branch_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    founding_date DATE,
    city VARCHAR(255),
    PRIMARY KEY (id) -- Choose wisely
    -- PRIMARY KEY (branch_id)
);
-- @BLOCK
-- If you don't need auto id,
-- then comment id and uncomment unit_id
-- modify foreign and primary key aswell
-- otherwise just ignore.
CREATE TABLE Units (
    id INT NOT NULL AUTO_INCREMENT,
    -- unit_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    branch_id INT NOT NULL,
    PRIMARY KEY (id),
    -- PRIMARY KEY (unit_id),
    FOREIGN KEY (branch_id) REFERENCES Branches(id)
);
-- @BLOCK
-- If you don't need auto id,
-- then comment id and uncomment personnel_id
-- modify foreign and primary key aswell
-- otherwise just ignore.
CREATE TABLE Employees (
    id INT NOT NULL AUTO_INCREMENT,
    -- personnel_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    age INT,
    salary INT,
    unit_id INT NOT NULL,
    PRIMARY KEY (id),
    -- PRIMARY KEY (personnel_id),
    FOREIGN KEY (unit_id) REFERENCES Units(id)
);
-- @BLOCK
-- Let's input some data!
INSERT INTO Branches (name, description, founding_date, city)
VALUES (
        'شانول فرآیند',
        '2000-1-1',
        'تهران'
    ),
    (
        'شانول فرآیند',
        '2004-1-1',
        'ونکوور'
    ),
    (
        'اینوتک',
        '2018-5-6',
        'تهران'
    ),
    (
        'بانک دی',
        '1997-3-5',
        'اصفهان'
    ),
    (
        'شهر فرش',
        '2006-12-12',
        'اصفهان'
    );
-- @BLOCK
SELECT *
FROM Branches;
-- @BLOCK
INSERT INTO Units (name, description, branch_id)
VALUES ('Energy', 'Consulting', 1),
    ('Fuel', 'Engineering', 1),
    ('Electric', 'Engineering', 2),
    ('Software', 'Mobile App', 3),
    ('Game', 'Development', 3),
    ('مرکزی', 'وام و اختلاس', 4),
    ('کوچه علی چپ', 'فقط اختلاس', 4),
    ('مرکزی', 'فروش قسطی فرش', 5),
    ('خیلی دور', 'گران فروشی', 5);
-- @BLOCK
SELECT *
FROM Units;
-- @BLOCK
INSERT INTO Employees (name, age, salary, unit_id)
VALUES ('سامان', 34, 3500, 1),
    ('فرهاد', 30, 2500, 1),
    ('شروین', 24, 1500, 2),
    ('رامین', 43, 1000, 3),
    ('مریم', 40, 1400, 3),
    ('بهار', 28, 2700, 4),
    ('نوید', 26, 370, 4),
    ('هانی', 45, 2300, 5),
    ('محمد', 34, 4000, 5),
    ('حسین', 34, 4000, 6),
    ('شاهین', 50, 700, 6),
    ('غزل', 50, 1500, 8),
    ('آهو', 40, 500, 8),
    ('پروانه', 20, 900, 8),
    ('روزبه', 24, 1500, 9),
    ('نوشاد', 18, 4700, 9),
    ('اصغر', 67, 600, 9);
-- @BLOCK
SELECT *
FROM Employees;