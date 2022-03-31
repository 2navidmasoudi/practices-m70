<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body class="container pt-3">
<?php

include "shop/product.inc.php";
include "shop/shop.inc.php";

$pant = new Pants('a', 2, ['color' => 'red']);
$pant->setSize(30);

$shirt = new Shirt('a', 3, ['color' => 'blue']);
$shirt->setSize('xm');
print_r($shirt);
?>
</body>

</html>