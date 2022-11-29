<?php

//Simple routing table from user input url path
$routes = [];

route('/', function () {
  header('Location: '. 'view/home/index.php');
});

route('/login', function () {
  header('Location: '. 'view/user/login.php');
});

route('/register', function () {
  header('Location: '. 'view/user/register.php');
});

route('/user-edit', function () {
  header('Location: '. 'view/user/edit.php');
});

route('/user-panel', function () {
  header('Location: '. 'view/user/index.php');
});

route('/about-us', function () {
  header('Location: '. 'view/home/about.php');
});

route('/add-review', function () {
  header('Location: '. 'view/review/add.php');
});

route('/review', function () {
  header('Location: '. 'view/review/index.php');
});

route('/add-price', function () {
  header('Location: '. 'view/price/add.php');
});

route('/edit-price', function () {
  header('Location: '. 'view/price/edit.php');
});

route('/price', function () {
  header('Location: '. 'view/price/index.php');
});

route('/booking', function () {
  header('Location: '. 'view/booking/index.php');
});

route('/booking-add', function () {
  header('Location: '. 'view/booking/add.php');
});

route('/booking-edit', function () {
  header('Location: '. 'view/booking/edit.php');
});

route('/404', function () {
  header('Location: '. 'view/home/index.php');
});

function route(string $path, callable $callback) {
  global $routes;
  $routes[$path] = $callback;
}

run();

function run() {
  global $routes;
  $uri = $_SERVER['REQUEST_URI'];
  $found = false;
  foreach ($routes as $path => $callback) {
    if ($path !== $uri) continue;

    $found = true;
    $callback();
  }

  if (!$found) {
    $notFoundCallback = $routes['/404'];
    $notFoundCallback();
  }
}