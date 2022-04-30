<?php

require_once "DNA.php";

$input = readline();
[$personDNA, $virusDNA] = explode(" ", $input);

// $personDNA = "treehgcftfdsamntreebhfeert";

// $virusDNA = "e2rT";
// $virusDNA = "e12rT"; // IT'S OK TOO

$virusDNA = expandDNA($virusDNA);

if (str_contains($personDNA, strrev($virusDNA))) {
    echo "Shoma Bimar Nemishavid";
} elseif (str_contains($personDNA, $virusDNA)) {
    // badbakht shodi raft!
    echo "Shoma Bimar Hastid";
} else {
    echo "Shoma Salem Hastid";
}
