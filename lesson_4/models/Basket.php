<?php

namespace app\models;

use app\engine\Db;

class Basket extends DBModel
{
    public $id;
    public $session_id;
    public $user_id;
    public $products_id;
    public $count;
    public $price;

    public function __construct($session_id = null, $user_id = null, $products_id = null, $count = null, $price = null)
    {
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->products_id = $products_id;
        $this->count = $count;
        $this->price = $price;
    }

    public static function getBasket()
    {
        //$session = session_id();
        $session = 111; // temp for example
        $sql = "SELECT 
        basket.id basket_id, 
        products.id prod_id, 
        products.name, 
        products.description, 
        products.price,
        basket.count
        FROM `basket`,`products` 
        WHERE `session_id` = '{$session}' 
        AND basket.products_id = products.id";
        return Db::getInstance()->queryAll($sql);
    }

    protected static function getTableName()
    {
        return 'basket';
    }
}
