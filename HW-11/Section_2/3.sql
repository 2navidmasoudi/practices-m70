-- Link: https://www.hackerrank.com/challenges/salary-of-employees/problem
-- Problem: Employee Salaries
SELECT name
FROM Employee
WHERE salary > 2000
    and months < 10
ORDER BY employee_id;