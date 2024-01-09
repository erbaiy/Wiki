<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

use App\Controllers\AutontificationController;
use Symfony\Component\VarDumper\VarDumper;

use App\Controllers\admin\CategoryController;

$router = isset($_GET['route']) ? $_GET['route'] : 'home';
switch ($router) {
    case 'home':
        require('../view/index.php');
        break;
    case 'admin':
        require('../view/admin/home.php');
        break;
    case 'Dashboard':
        require('../view/admin/Dashboard.php');
        break;

    case 'register':
        $register = new AutontificationController();
        $register->register();
        require('../view/register.php');
        break;

    case 'login':
        $register = new AutontificationController();
        $register->login();
        break;

    case 'getlogin':
        $register = new AutontificationController();

        $register->getlogin();

        break;
    case 'author':

        require('../view/author/author.php');
        break;
        break;
    case 'tags':

        require('../view/admin/tags.php');
        break;
    case 'users':

        require('../view/admin/users.php');
        break;

    case 'selectData':

        $objet = new CategoryController();
        $objet->selectData();

        break;
    case 'addCategory':

        $objet = new CategoryController();
        $objet->addCategory();

        break;
    case 'deleteCategory':

        $objet = new CategoryController();
        $objet->deleteCategory();

        break;
    case 'selectCategoryName':

        $objet = new CategoryController();
        $objet->selectCategoryName();

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
