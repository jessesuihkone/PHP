<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <title>PHP API CRUD operation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round | Open+Sans"> 
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Add New <b>Movie</b></h2>
                        </div>
                    </div>
                </div>
                <form action="create.php" method="POST" id="myform"> 
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label>Opening Crawl</label>
                        <input type="text" name="crawl" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label>Director</label>
                        <input type="text" name="director" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Release Date</label>
                        <input type="text" name="rdate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Starships</label>
                        <input type="text" name="ships" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Characters</label>
                        <input type="text" name="characters" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Planets</label>
                        <input type="text" name="planets" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button> 
                </form>
            </div>
        </div>
    </div>
</body>
</html>