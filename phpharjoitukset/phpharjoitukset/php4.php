<?php
$r = 0;
$values = $_POST['songs'];


foreach ($values as $x) {
    
    if ($x == 1) {
        $r += 1;
    }   else {
        $r += 1.25;
    }

}
echo $r ."€";
?>