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
    $array = array("tammikuu", "helmikuu", "maaliskuu", "huhtikuu", "toukokuu", "kesäkuu", "heinäkuu", "syyskuu", "lokakuu", "marraskuu", "joulukuu");
	
    foreach ($array as $loopdata) {
        echo "$loopdata "; 
    }

        ?>
		</table>
</table>
</body>
</html>