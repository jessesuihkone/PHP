<?php

include('db_config.php');
include('token.php');

$title = $crawl = $director = $rdate = $ships = $characters = $planets = "";

if(!isset($status)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $crawl = $_POST['crawl'];
    $director = $_POST['director'];
    $rdate = $_POST['rdate'];
    $ships = $_POST['ships'];
    $characters = $_POST['characters'];
    $planets = $_POST['$planets'];
    if(isset($_POST['id']) && isset($_POST['id']) > 0) {
        $stmt = $pdo->prepare("UPDATE movies SET title = ?, crawl = ?, director = ?, rdate = ?, ships = ?, characters = ?, planets = ? WHERE id = ?");
        $stmt->execute([$title, $crawl, $director, $rdate, $ships, $characters, $planets, $id]);
        $updated = $stmt->rowCount();
        if($updated > 0) {
            $status = 'true';
            $data = "Data updated";
            $code = '10';
        } else {
            $status = 'true';
            $data = "Data not updated";
            $code = '9';
        }
    }
}
echo json_encode(['status' => $status, 'data' => $data, 'code' => $code]);
?>