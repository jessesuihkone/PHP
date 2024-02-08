<?php

    session_start();

    $check = $_SESSION['sana'];

    if($check == $_POST['res']) {
        echo "Sana on oikein!!!";
    } else {
        echo "Väärin meni!";
    }

?>