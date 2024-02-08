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
        <button>SUBMIT</button>
    </form>
<?php

$luku = $_GET['numbr'];

if ($luku % 400 == 0) {
    echo "On karkausvuosi";
} else if ($luku % 100 == 0) {
    echo "Ei ole karkausvuosi";
} else if ($luku % 4 == 0) {
    echo "On karkausvuosi";
} else {
    echo "Ei ole karkausvuosi";
}

?>

</body>
</html>