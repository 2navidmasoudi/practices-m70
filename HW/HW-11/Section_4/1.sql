-- Link: https://www.hackerrank.com/challenges/african-cities/problem
-- Problem: African Cities
SELECT CITY.NAME
FROM CITY
    INNER JOIN COUNTRY ON CITY.COUNTRYCODE = COUNTRY.CODE
WHERE COUNTRY.CONTINENT = "Africa";