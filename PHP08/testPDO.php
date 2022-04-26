<?php

$host = "localhost";
$username = "root";
$password = "4845647";
$dbname = "Maktab";

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>id</th><th>name</th><th>age</th></tr>";

class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
    }
    function beginChildren()
    {
        echo "<tr>";
    }
    function endChildren()
    {
        echo "</tr>" . "\n";
    }
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $conn->prepare("SELECT * FROM Students WHERE name Like :search");
    $stmt->execute(["search" => "%a%"]);

    // $sth = $dbh->prepare('SELECT name, colour, calories
    // FROM fruit
    // WHERE calories < ? AND colour = ?');
    // $sth->bindParam(1, $calories, PDO::PARAM_INT);
    // $sth->bindParam(2, $colour, PDO::PARAM_STR);

    // $stmt->bindParam(':search', $search);
    // $stmt->bindParam(':search', $search);

    // insert a row
    // $search = "%a%";
    // $lastname = "Doe";
    // $email = "john@example.com";
    // $stmt->execute();


    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
        echo $v;
    }
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
