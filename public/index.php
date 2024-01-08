<?php

// use App\Controllers\Home;


$router = isset($_GET['route']) ? $_GET['route'] : 'home';
switch ($router) {
    case 'home':
        require('../view/home.php');
        break;
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}
// use App\core\Router;

// var_dump(new Router());
// die();
// $x = new Router();

// $x->get('/', fn () => Home::index());
// $x->dispatch();
