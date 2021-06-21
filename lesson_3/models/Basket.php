<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $session_id;
    public $user_id;
    public $products_id;
    public $count;
    public $price;

    public function __construct($session_id = '', $user_id = '', $products_id = '', $count = '', $price = '')
    {
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->products_id = $products_id;
        $this->count = $count;
        $this->price = $price;
    }

    protected function getTableName()
    {
        return 'basket';
    }


}

