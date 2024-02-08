    <?php

    $hinta = $_POST['hinta'];
    $vero = $_POST['vero'];

    echo "Veroton hinta: ". $hinta. "<br>";
    echo "Verokanta: ". $vero. "%<br>";
    echo "Verollinen hinta: ". ($hinta * ($vero / 100));
    ?>