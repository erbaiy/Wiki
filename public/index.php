<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

use App\Controllers\AutontificationController;
use Symfony\Component\VarDumper\VarDumper;

use App\Controllers\admin\CategoryController;
use App\Controllers\admin\TagsController;
use App\Controllers\author\WikiController;
use App\Models\Autontification;
use App\Controllers\admin\ArchifeController;
use App\Controllers\admin\StatistiqueContrller;

$router = isset($_GET['route']) ? $_GET['route'] : 'home';
switch ($router) {
    case 'home':
        $objet = new WikiController();
        $objet->WikiHome();
        break;
    case 'logout':
        $objet = new AutontificationController();
        $objet->logout();
        break;
    case 'admin':
        require('../view/admin/home.php');
        break;
    case 'Dashboard':
        $objet = new StatistiqueContrller();
        $objet->countTags();
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
    case 'updateCategory':

        $objet = new CategoryController();
        $objet->updateCategory();

        break;
        // TAGS_________________

    case 'getTags':

        $objet = new TagsController();
        $objet->getTags();

        break;
    case 'deleteTags':

        $objet = new TagsController();
        $objet->deleteTags();

        break;
    case 'updateTags':

        $objet = new TagsController();
        $objet->updateTags();
        break;
    case 'addTags':

        $objet = new TagsController();
        $objet->addTags();
        break;
    case 'addWiki':

        $objet = new WikiController();

        $objet->addWiki();



        break;
        break;
    case 'author':
        $objet = new WikiController();
        $objet->selectWiki();
        break;
    case 'deleteWiki':
        $objet = new WikiController();
        $objet->deleteWiki();
        break;
    case 'searchWiki':
        $objet = new WikiController();
        $objet->search();
        break;
    case 'selectWikiforUpdate':
        $objet = new WikiController();
        $objet->selectWikiforUpdate();
        break;
    case 'updatWiki':
        $objet = new WikiController();
        $objet->updatWiki();
        break;



        // wiki arichifi-----------------------
    case 'archife':
        $objet = new ArchifeController();
        $objet->selectArchifier();
        break;
    case 'archifier':
        $objet = new ArchifeController();
        $objet->archifier();
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
