<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anagrammi peli</title>
</head>
<body>

    <?php
        session_start();

        $filePath = 'sanat.txt';

        $words = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $randomWord = lcfirst($words[array_rand($words)]);

        $_SESSION['sana'] = $randomWord;

        $randomizedWord = str_shuffle($randomWord);

        echo $randomizedWord;

    ?>

    <form action="ioe.php" method="post">
        <input type="text" name="res">
    </form>
</body>
</html>