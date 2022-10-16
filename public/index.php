<?php
require '../Core/Router.php';
$router = new Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
?>
