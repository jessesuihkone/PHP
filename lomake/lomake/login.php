<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = $_POST["use"];
    $salasana = $_POST["psw"];

    if ($usr === "Mikko" && $salasana === "Miekkakala") {
        $_SESSION["username"] = $usr;
        header("Location: etusivu.php");
        exit();
    } else {
        header("Location: login.html");
        exit();
    }
}
?>
