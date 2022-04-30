1. Solve site exercises: https://regexone.com/

---

2. Write a pattern that matches a string that has an a followed by one or more b's

`ab+`

3. Write a pattern that matches a string that has an a followed by zero or one 'b'.

`ab?`

4. Write a pattern that matches a string that has an a followed by three 'b'.

`ab{3}`

5. Write a pattern that matches a string that has an a followed by two to three 'b'.

`ab{2,3}`

6. Write a pattern to find sequences of lowercase letters joined with a underscore.

`([a-z]+)_*`

7. Write a pattern to find the sequences of one upper case letter followed by lower case letters.

`[A-Z][a-z]+`

8. Write a pattern that matches a string that has an 'a' followed by anything, ending in 'b'.

`a\w+b`

9. Write a pattern that matches a word at the beginning of a string(skip space).

`^(?:\s*)(\w+)`

10. Write a pattern where a string will start with a specific number.

`^\d+\w*`

11.Write a pattern to validate email address.

`^\w+@\w+\.\w+$`

12. Write a pattern to Date in format dd/mm/yyyy

`^([0-2][0-9]|3[0-1])\/(0[0-9]|1[0-2])\/([0-9]{4})$`

13. Write a pattern to match valid URL slugs.

`[a-z0-9]+(?:-[a-z0-9]+)*$`

14. Write a pattern to match URL with optional protocol.

`(https?:\/\/)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#()?&//=]*)`

15. Write a pattern to match IP v4 addresses

`^(?:(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])(\.(?!$)|$)){4}$`

16. Write a pattern to match whole numbers below zero

`-[1-9]\d*`

`^-\d+\.?\d*$`

17. Write a pattern to match integers or floats that are positive or negative

`^-?\d*\.{0,1}\d+$`

18. Write a pattern to match opening and closing HTML tags with content between

`<.+\/\w*`

19. Write a pattern to RGB hex colors.(like: #800000)

`^#(?:[0-9a-fA-F]{3}){1,2}$`

20. Write a pattern to validating youtube video.
    Support:
    http://youtu.be/cCnrX1w5luM  
     http://youtube/cCnrX1w5luM  
     www.youtube.com/cCnrX1w5luM  
     youtube/cCnrX1w5luM  
     youtu.be/cCnrX1w5luM

`^(?:http:\/\/|www.)?you(?:tube\.com|tube|tu\.be)\/\w+$`

21. What does this expression do?

    /\d{1,3}(?=(\d{3})+(?!\d))/g

`It Would translate to every third digit from the end of the last 3 digits in a numerical string and the last 3 digits of that numerical string. `

```
for example:
$num = "1020304050";
$num = preg_replace("/\d{1,3}(?=(\d{3})+(?!\d))/g", ",");
echo $num; // output: 1,020,304,050
```

> [embeded expression](https://embed.ihateregex.io/make/JTVDJTVDZCU3QjElMkMzJTdEKCUzRiUzRCglNUMlNUNkJTdCMyU3RCklMkIoJTNGISU1QyU1Q2QpKQ)

## [23](23.php)

## [24](24.php)

### [Document](https://docs.google.com/document/d/1cfL30jfFlPEGPHf9AymxC_obSmQJoDDax1leNfH6zOo/edit)
