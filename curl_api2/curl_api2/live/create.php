<?php

include('db_config.php');
include('token.php');
$title = $crawl = $director = $rdate = $ships = $characters = $planets = "";
if(!isset($status)) {
    $title = $_POST['title'];
    $crawl = $_POST['crawl'];
    $director = $_POST['director'];
    $rdate = $_POST['rdate'];
    $ships = $_POST['ships'];
    $characters = $_POST['characters'];
    $planets = $_POST['planets'];
    if(isset($_POST['title'])) {
        $stmt = $pdo->prepare("INSERT INTO movies (title, crawl, director, rdate, ships, characters, planets ) VALUES (?, ?, ?)");
        $stmt->execute([$title, $crawl, $director, $rdate, $ships, $characters, $planets]);
        $inserted = $stmt->rowCount();
        if($inserted > 0) {
            $status = 'true';
            $data = "Data inserted";
            $code = '10';
        } else {
            $status = 'true';
            $data = "Data not inserted";
            $code = '9';
        }
    }
}
echo json_encode(['status' => $status, 'data' => $data, 'code' => $code]);
?>