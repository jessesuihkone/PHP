<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
    <title>Registration form</title>
</head>
<body>
    <h3>Fill out the information</h3>

    <div>
        <form action="signupProcess.php" method="POST">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Your Address">

            <input type="submit" value="Save" name="save">
        </form>
    </div>
</body>
</html>