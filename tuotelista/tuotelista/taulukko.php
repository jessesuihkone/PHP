<!DOCTYPE html>
<html lang="en">
<head>
  <title>Autot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-fluid bg-primary text-white text-center">
    <nav class="navbar navbar-expand-sm bg-primary p-3">

        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-bg-primary    " href="#">Selaa autoja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-bg-primary" href="#">Lisää uusi auto</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

<?php

$cars = array(
    array(1, "Volvo", 22, 18),
    array(2, "BMW", 15, 13),
    array(3, "Saab", 5, 2),
    array(4, "Land Rover", 17, 15),
);

echo "<table class='table border border-3'>";
echo "<tr><th>AutoID</th><th>Auto</th><th>Varastossa</th><th>Myyty</th><th>Muokkaa</th><th>Poista</th></tr>";

foreach ($cars as $car) {
    
    echo "<tr>";

    foreach ($car as $key => $value) {
        echo "<td>";
        echo $value;
        echo "</td>";
    }

    echo "<td><a href='edit_car.php?id={$car[0]}' class='bi bi-pencil-square'></a></td>";
    echo "<td><a href='delete_car.php?id={$car[0]}' class='bi bi-trash'></a></td>";

    echo "</tr>";
}

echo "</table>";

?>


    
</body>
</html>