<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <form method="GET">
        <input type="number" name="numbr">
        <button>SUBMIT</button>
    </form>

<?php
    $luku = $_GET['numbr'];
    echo $luku + (rand(1,10));
?>
</body>
</html>