<?php

use app\engine\Render;
use app\engine\TwigRender;
use app\models\{Product, User, Basket, Feedback, Order};
use app\engine\Autoload;

include "../config/config.php";
include "../engine/Autoload.php";
include '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = $url[1] ?: 'product';
$actionName = null;
if (isset($url[2])) {
    $actionName = $url[2];
}

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    //$controller = new $controllerClass(new Render());
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    echo "404";
}

die();
// с $params не получилось в DBModel.php....
$product = Product::getWhere('name','Пиво');

die();

//INSERT
$product = new Product("beer.jpg", "Пиво", "Чешское разливное", 150);
$product->save();

die();

//UPDATE GET
$product = Product::getOne(23);
$product->price = 350;
$product->save();

die();

//DELETE
$product = Product::getOne(24);
$product->delete();





























die();
/*
//CREATE
$product = new Product();
$product->name = 'Чай';
$product->price = 23;
$product->insert();

//READ
$product = new Product();
$product->getOne(5);
$product->getAll();

//UPDATE
$product = new Product();
$product->getOne(5);
$product->price = 25;
$product->update();

//DELETE
$product = new Product();
$product->getOne(5);
$product->delete();
*/