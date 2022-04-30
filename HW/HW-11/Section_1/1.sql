-- https://www.hackerrank.com/challenges/revising-the-select-query/problem
-- Problem: Revising the Select Query I
SELECT *
FROM CITY
WHERE COUNTRYCODE = "USA"
    AND POPULATION > 100000;