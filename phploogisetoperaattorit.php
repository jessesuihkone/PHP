<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="GET">
        <input type="number" name="numbr">
        <input type="number" name="numbr2">
        <button>NAPS</button>
    </form>
<?php

    $luku = $_GET['numbr'];

    $luku2 = $_GET['numbr2'];

    if ($luku % 2 == 0 && $luku2 % 2 == 0) {
        echo "Luvut ovat parillisia";
    } else {
        echo "Luvut eivät ole parillisia";
    }
?>

</body>
</html>