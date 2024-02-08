<?php
require_once 'model.php';
require_once 'view.php';
require_once 'controller.php';

$model = new Model($db_host = 'localhost', $db_name = 'recipes', $db_user = 'root', $db_password = '');
$view = new View();
$controller = new Controller($model, $view);

$controller->showAll();
//:) guuguugaagaa
?>
