<?php
if(isset($_GET['id'])) {
    $url = "https://swapi.dev/api";
    $ch = curl_init();
    $arr['id'] = $_GET['id'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
    $result = curl_exec($ch);
    curl_close($ch);

     $result = json_decode($result, true);
} else {
    echo "id not found";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>PHP API CRUD operation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round | Open+Sans"> 
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Edit <b>Movie</b></h2>
                        </div>
                    </div>
                </div>
                <?php
                if(isset($result['status']) && isset($result['code']) && isset($result['code']) == 5) {

                ?>

                    <form action="update.php" method="POST" id="myform">
                        <table class="table table-bordered">
                            <?php   foreach($result['data'] as $list) {

                            ?>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $list['id'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="title" value="<?php echo $list['title'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="director" value="<?php echo $list['director'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="rdate" value="<?php echo $list['rdate'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="ships" value="<?php echo $list['ships'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="characters" value="<?php echo $list['characters'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="planets" value="<?php echo $list['rdate'] ?>" class="form-control">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            
                            <?php
                                }
                            ?>

                        </table>
                    </form>

                    <?php

                    } else {
                        //echo $result['data'];
                    }
                    ?>
            </div>
        </div>
    </div>

</body>
</html>