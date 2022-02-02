# 1. What Happens When Your Browser Requests a Web Page?

There are a handful of general steps that occur between the time you request a web page and the time it displays in your browser.

1. DNS Lookup
2. Browser sends an HTTP request
3. Server responds and sends back the requested HTML file
4. Browser begins to render HTML
5. Browser sends additional requests for objects embedded in the html file (CSS files, images, javascript, etc.)

DNS Lookup means it search the domain you requested for IP address from:

- Browser cache
- Operating system cache
- Router cache
- ISP DNS cache

[Source and read more](https://vanseodesign.com/web-design/browser-requests/)

# 2. Common Encryption Algorithms

1. **Triple DES**

   [Triple DES](https://www.tutorialspoint.com/cryptography/triple_des.htm) was designed to replace the original Data Encryption Standard (DES) algorithm, which hackers eventually learned to defeat with relative ease. At one time, Triple DES was the recommended standard and the most widely used symmetric algorithm in the industry.

   Triple DES uses three individual keys with 56 bits each. The total key length adds up to 168 bits, but experts would argue that 112-bits in key strength is more accurate. Despite slowly being phased out, Triple DES has, for the most part, been replaced by the Advanced Encryption Standard (AES).

2. **AES**

   The [Advanced Encryption Standard (AES)](https://www.tutorialspoint.com/advanced-encryption-standard-aes) is the algorithm trusted as the standard by the U.S. Government and numerous organizations. Although it is highly efficient in 128-bit form, AES also uses keys of 192 and 256 bits for heavy-duty encryption purposes.

   AES is largely considered impervious to all attacks, except for brute force, which attempts to decipher messages using all possible combinations in the 128, 192, or 256-bit cipher.

3. **RSA Security**

   [RSA](https://www.comparitech.com/blog/information-security/rsa-encryption/) is a public-key encryption algorithm and the standard for encrypting data sent over the internet. It also happens to be one of the methods used in PGP and GPG programs. Unlike Triple DES, RSA is considered an asymmetric algorithm due to its use of a pair of keys. You’ve got your public key to encrypt the message and a private key to decrypt it. The result of RSA encryption is a huge batch of mumbo jumbo that takes attackers a lot of time and processing power to break.

[Source and more...](https://blog.storagecraft.com/5-common-encryption-algorithms/)

---

# 3. What is Hashing?

**Hashing is the process of converting any input of any length into a fixed sized string of text using a mathematical function.**

> This means any text, no matter how long it is can be converted into an array of numbers and letters through an algoythm.

[Source and learn more...](https://www.youtube.com/watch?v=2BldESGZKB8)

## diffrence between _Hashing_ and _Encoding_ and _Encryption_:

- **_Hashing_**: Is a one-way summary of data, cannot be reversed, used to validate the integrity of data.

- **_Encoding_**: Reversible transformation of data format, used to preserve usability of data.

- **_Encryption_**: Secure encoding of data used to protect confidentiality of data.

## Hash functions

| Original text  | Hello World!                                                     |
| -------------- | ---------------------------------------------------------------- |
| Original bytes | 48:65:6c:6c:6f:20:57:6f:72:6c:64:21 (length=12)                  |
| Adler32        | 1c49043e                                                         |
| CRC32          | 1c291ca3                                                         |
| Haval          | 2242f559aa860d68c6de6d025e65d32e                                 |
| MD2            | 315f7c67223f01fb7cab4b95100e872e                                 |
| MD4            | b2a5cc34fc21a764ae2fad94d56fadf6                                 |
| MD5            | ed076287532e86365e841e92bfc50d8c                                 |
| RipeMD128      | 24e23e5c25bc06c8aa43b696c1e11669                                 |
| RipeMD160      | 8476ee4631b9b30ac2754b0ee0c47e161d3f724c                         |
| SHA-1          | 2ef7bde608ce5404e97d5f042f95f89f1c232871                         |
| SHA-256        | 7f83b1657ff1fc53b92dc18148a1d65dfc2d4b1fa3d677284addd200126d9069 |

[Try it yourself - See more hash functions](https://www.fileformat.info/tool/hash.htm)

# 4. GET vs POST in HTTP:

## HTTP Methods

- GET
- POST
- PUT
- HEAD
- DELETE
- PATCH
- OPTIONS

---

### The GET Method

**GET is used to request data from a specified resource.**

**GET is one of the most common HTTP methods.**

Note that the query string (name/value pairs) is sent in the URL of a GET request:

```
/test/demo_form.php?name1=value1&name2=value2
```

**Some other notes on GET requests:**

- GET requests can be cached
- GET requests remain in the browser history
- GET requests can be bookmarked
- GET requests should never be used when dealing with sensitive data
- GET requests have length restrictions
- GET requests are only used to request data (not modify)

---

### The POST Method

POST is used to send data to a server to create/update a resource.

The data sent to the server with POST is stored in the request body of the HTTP request:

```
POST /test/demo_form.php HTTP/1.1
Host: w3schools.com

name1=value1&name2=value2
```

**POST is one of the most common HTTP methods.**

**Some other notes on POST requests:**

- POST requests are never cached
- POST requests do not remain in the browser history
- POST requests cannot be bookmarked
- POST requests have no restrictions on data length

[Source](https://www.w3schools.com/tags/ref_httpmethods.asp)
