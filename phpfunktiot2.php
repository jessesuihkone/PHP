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
    <input type="text"  name="res">
</form>

    <?php
    function laskALV($rahasumma) {
        $x = $rahasumma * 0.24;
        echo $x;
    }
    $x = $_GET['res'];
    laskALV($x);
?>

</body>
</html>