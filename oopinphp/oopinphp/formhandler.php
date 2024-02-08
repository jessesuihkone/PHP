<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Form Handler</title>
</head>
<body>
    
    <?php
    require_once 'product.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hinta'])) {
        
        $product = new Product(
            $_POST['nimi'] ?? '',
            $_POST['valmistaja'] ?? '',
            $_POST['hinta'],
            $_POST['kuvaus'] ?? ''
        );

        $alvi = 24;

        echo "<h1>Lomakkeelta lähetetyt tiedot:</h1>";
        echo "<table class='table'>";
        echo "<tr><td>Tuotteen nimi</td><td>{$product->getNimi()}</td></tr>";
        echo "<tr><td>Valmistaja</td><td>{$product->getValmistaja()}</td></tr>";
        echo "<tr><td>Tuotteen veroton hinta</td><td>{$product->getHinta()} €</td></tr>";

        $alvHinta = $product->get_alvhinta($alvi);
        echo "<tr><td>Tuotteen verollinen hinta (sis. {$alvi}% ALV)</td><td>{$alvHinta} €</td></tr>";

        echo "<tr><td>Kuvaus</td><td>{$product->getKuvaus()}</td></tr>";
        echo "</table>";

    } else {
        echo "<p>Hinta ei ole asetettu lomakkeelta.</p>";
    }
    ?>
</body>
</html>
