<?php
session_start();
if(isset($_POST['title'])) {
    $url = "https://swapi.dev/api/"
    $ch = curl_init();
    $arr['id'] = $_POST['id'];
    $arr['title'] = $_POST['title'];
    $arr['crawl'] = $_POST['crawl'];
    $arr['rdate'] = $_POST['rdate'];
    $arr['ships'] = $_POST['ships'];
    $arr['characters'] = $_POST['characters'];
    $arr['planets'] = $_POST['rdate'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);

    if(isset($result['status']) && isset($result['code']) && $result['code'] == 10) {
        header('Location:index.php');
        $_SESSION['success_mg'] = $result['data'];
        die();
    } else {
        echo $result['data'];
    }
} else {
    header('Location:index.php');
}


?>