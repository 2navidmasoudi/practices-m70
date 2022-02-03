<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <h1>Travel Reservation form</h1>
    <p><b>&#9733; denotes mandatory</b></p>

    <form action="">
        <label for="">Fullname&#9733;:</label>
        <br>
        <input type="text" placeholder="FirstName LastName">
        <br>
        <label for="">Email address&#9733;:</label>
        <br>
        <input type="email" placeholder="EMAIL_ADDRESS">
        <br>
        <label for="">Select Tour Package&#9733;:</label>
        <br>
        <select name="" id="">
            <option value="">
                Goa
            </option>
            <option value="">
                Khafan
            </option>
        </select>
        <br>
        <label for="">Arival date&#9733;:</label>
        <br>
        <input type="date" name="" id="" placeholder="m/d/y">
        <br>
        <label for="">Number of person&#9733;</label>
        <br>
        <input type="number" name="" id="" placeholder="UNKNOWN_TYPE">
        <br>
        <label>What would you want to avail?&#9733;</label>
        <br>
        <label for="">Boarding</label>
        <input type="checkbox" name="Boarding" id="">
        <br>
        <label for="">Fooding</label>
        <input type="checkbox" name="Fooding" id="">
        <br>
        <label for="">Sight Seeing</label>
        <input type="checkbox" name="Sight" id="">
        <br>
        <label for="">Discount Coupon code:</label>
        <br>
        <input type="number" name="" id="" placeholder="UNKNOWN_TYPE">
        <br>
        <label for="">Term and conditions</label>
        <br>
        <input type="radio" name="agree" id="">
        <label for="">I agree</label>
        <input type="radio" name="agree" id="">
        <label for="">I disagree</label>
        <br>
        <input type="submit" value="Complete reservation">
    </form>
</body>

</html>