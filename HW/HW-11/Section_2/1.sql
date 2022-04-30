-- Link: https://www.hackerrank.com/challenges/weather-observation-station-3/problem
-- Problem: Weather Observation Station 3
SELECT DISTINCT CITY
FROM STATION
WHERE mod(ID, 2) = 0
ORDER BY CITY;