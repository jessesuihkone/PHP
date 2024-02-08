<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<table>

<?php 
		for ( $r = 1; $r < 11; $r++) {
		echo "<tr>";
			for ( $c=1; $c<11; $c++) {
			echo "<td><p>" . $r*$c . "</p></td>" ;
            }		
		}        
		?>
		</table>
</table>
</body>
</html>