-- @BLOCK 1.1
SELECT name
FROM Employees
WHERE salary < 1000;
-- @BLOCK 1.2
SELECT Employees.name AS employee_name,
    Units.name AS unit_name
FROM Employees
    INNER JOIN Units ON Employees.unit_id = Units.id;
-- @BLOCK 1.3
SELECT AVG(Employees.salary) AS average_salary,
    Units.name AS unit_name
FROM Units
    INNER JOIN Employees ON Employees.unit_id = Units.id
GROUP BY Employees.unit_id;
-- @BLOCK 1.4
SELECT Units.name AS unit_name,
    Branches.name AS branch_name
FROM Units
    INNER JOIN Branches ON Units.branch_id = Branches.id
WHERE Branches.city = 'اصفهان';
-- @BLOCK 1.5
SELECT COUNT(Units.id) AS unit_count,
    Branches.name AS branch_name
FROM Units
    INNER JOIN Branches ON Units.branch_id = Branches.id
GROUP BY Branches.name;
-- @BLOCK 1.6
SELECT Employees.name AS employee_name,
    Branches.name AS branch_name
FROM Employees
    INNER JOIN Units ON Employees.unit_id = Units.id
    INNER JOIN Branches on Units.branch_id = Branches.id;
-- @BLOCK 1.7
SELECT AVG(Employees.salary) AS average_salary,
    Branches.city AS city
FROM Employees
    INNER JOIN Units ON Employees.unit_id = Units.id
    INNER JOIN Branches ON Units.branch_id = Branches.id
WHERE Branches.city = 'اصفهان';
-- GROUP BY Branches.city;
-- @BLOCK 1.8
SELECT COUNT(Employees.id) AS employee_count,
    Branches.name AS branch_name
FROM Employees
    INNER JOIN Units ON Employees.unit_id = Units.id
    INNER JOIN Branches ON Units.branch_id = Branches.id
GROUP BY Branches.name;
-- @BLOCK 1.9
SELECT Units.name AS unit_name,
    COUNT(Employees.id) AS employee_count,
    Branches.name AS branch_name,
    Branches.city AS city
FROM Employees
    RIGHT JOIN Units ON Employees.unit_id = Units.id
    INNER JOIN Branches ON Units.branch_id = Branches.id
WHERE Branches.city = 'اصفهان'
GROUP BY Units.id;
-- @BLOCK 1.10
SELECT COUNT(Employees.id) AS employee_count,
    Branches.name AS branch_name
FROM Employees
    INNER JOIN Units ON Employees.unit_id = Units.id
    INNER JOIN Branches ON Units.branch_id = Branches.id
GROUP BY Branches.name
HAVING COUNT(Employees.id) < 10;
-- CHANGE 10 to 5 to see the result