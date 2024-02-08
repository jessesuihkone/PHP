<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form>
    <input type="number" name="num1" placeholder="Numero 1">
    <input type="number" name="num2" placeholder="Numero 2">

    <select name="operator">
        <option>None</option>
        <option>Lisää</option>
        <option>Vähennä</option>
        <option>Kerro</option>
        <option>Jaa</option>
        <option>Jakojäännös</option>
    </select>
    <br>
    <button type="submit" name="submit" value="submit">Laske</button>
</form>
<p>The answer is: </p>

<?php
    if (isset($_GET['submit'])) {
        $result1 = $_GET['num1'];
        $result2 = $_GET['num2'];
        $operator = $_GET['operator'];
        switch ($operator) {
            case "None":
                echo "Valitse laskutoimitus!";
            break;
            case "Lisää":
                echo $result1 + $result2;
            break;
            case "Vähennä":
                echo $result1 - $result2;
            break;
            case "Kerro":
                echo $result1 * $result2;
            break;
            case "Jaa":
                echo $result1 / $result2;
            break;
            case "Jakojäännös":
                echo $result1 % $result2;
            break;
        }
    }


?>

</body>
</html>