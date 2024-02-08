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
        <button>SUBMIT</button>
    </form>

<?php
    $luku = $_GET['numbr'];

    $luku2 = $_GET['numbr2'];

    echo $luku % $luku2;
?>

</body>
</html>