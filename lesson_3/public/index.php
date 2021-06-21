<?php

use app\models\{Product, User};
use app\engine\Db;
use app\engine\Autoload;
// app - vendor name (standart psr)

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product("coffee.jpg", "Кофе", "Капучино", 75);
//var_dump($product);
//var_dump(get_class_methods($product));
$product->insert();
$product->delete();

//$user = new User();
//var_dump($user->getOne(1));
//var_dump($user->getAll());




























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