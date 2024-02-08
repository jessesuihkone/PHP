<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    for ($x = 1; $x <= 100; $x++) {
        if ($x % 10 == 0) {
            echo "<strong>" . $x . "</strong><br>";
        } else {
            echo $x . "<br>";
        }
    }
?>


</body>
</html>