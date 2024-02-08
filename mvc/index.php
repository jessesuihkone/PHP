<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayttajat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>

<?php
require_once("db_config.php");
require_once("Model.php");

$view = new View();
$model = new Model();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action == 'edit') {

                $userId = $_GET['kayttajaid'];
                $user = $model->getUserById($userId);
                $view->editPage($user);
            } else if ($action == 'delete') {

                $userId = $_GET['kayttajaid'];
                $model->deleteUser($userId);

                header("Location: index.php");
            } else if ($action == 'add') {
                $view->newPage();
            } else {

                $users = $model->getAllUsers();
                $view->showAll($users);
            }
        } else {

            $users = $model->getAllUsers();
            $view->showAll($users);
        }
        break;
    case 'POST':
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            if ($action == 'add') {

                $etunimi = $_POST['etunimi'];
                $sukunimi = $_POST['sukunimi'];
                $model->addUser($etunimi, $sukunimi);

                header("Location: index.php");
            } else if ($action == 'update') {

                $userId = $_POST['kayttajaid'];
                $etunimi = $_POST['etunimi'];
                $sukunimi = $_POST['sukunimi'];
                $model->updateUser($userId, $etunimi, $sukunimi);

                header("Location: index.php");
            }
        }
        break;
    default:
        $users = $model->getAllUsers();
        $view->showAll($users);
}
?>
