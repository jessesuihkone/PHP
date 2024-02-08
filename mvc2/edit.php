<?php
require_once("signupConfig.php");
$data = new signupConfig();
$id = $_GET['id'];
$data->setId($id);

if(isset($_POST['edit'])){
    $data->setfirstName($_POST['firstname']);
    $data->setlastName($_POST['lastname']);
    $data->setAddress($_POST['address']);

    echo $data->update();
    echo "<script>alert('data Updated succesfully');document.location='allData.php'</script>";

}
$record = $data->fetchOne()
;
$val = $record[0]; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
    <title>Edit form</title>
</head>
<body>
    <h3>Edit file</h3>

    <div>
        <form action="" method="POST">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" value="<?php echo $val['firstName'];?>">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" value="<?php echo $val['lastName'];?>">

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $val['address'];?>">

            <input type="submit" value="UPDATE" name="edit">
        </form>
    </div>
</body>
</html>