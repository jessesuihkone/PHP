<?php

$luku1 = $_POST["luku1"];
$luku2 = $_POST["luku2"];

echo "<h2>Lukualue luvuille $luku1 - $luku2:</h2>";

$counter = 0; 
for ($x = $luku1; $x <= $luku2; $x++) {
    echo $x . " ";
    $counter++;

    if ($counter % 10 == 0) {
        echo "<br>";
    }
}

?>