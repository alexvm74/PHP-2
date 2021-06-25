<?php

use app\engine\Render;
use app\models\{Product, User, Basket, Feedback, Order};
use app\engine\Autoload;

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

/** @var Product $product */
/** @var User $user */

//index.php
//index.php?c=controller&a=action
//index.php?c=catalog&a=cart&id=5
//index.php?c=catalog
//index.php?c=basket&a=index
//index.php?c=basket&a=add&id=3

if (isset($_GET['c'])) {
    $controllerName = $_GET['c'] ?: 'product';
} else $controllerName = 'product';

if (isset($_GET['a'])) {
    $actionName = $_GET['a'];
} else $actionName = null;

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
//var_dump($controllerClass);

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "404";
}

die();

//INSERT
$product = new Product("coffee.jpg", "Кофе", "Капучино", 75);
$product->save();

//die();

//UPDATE GET
$product = Product::getOne(23);
$product->price = 370;
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