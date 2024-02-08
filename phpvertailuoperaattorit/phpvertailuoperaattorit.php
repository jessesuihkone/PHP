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
    </form>

<?php
    $luku = $_GET['numbr'];
    if ($luku > 5) {
        echo "Luku on suurempi kuin 5";
    }
    else {
        echo "Luku on pienempi kuin 5 tai on 5";
    };

?>

</body>
</html>