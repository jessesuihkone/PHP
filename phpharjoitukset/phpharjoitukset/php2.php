<?php

    $luku = $_POST["luku"];
    
    if (is_numeric($luku)) {
        echo "<h2>Kertotaulu luvulle $luku:</h2>";
        for ($i = 1; $i <= 10; $i++) {
            $tulo = $i * $luku;
            echo "$luku x $i = $tulo<br>";
        }
    }
?>
