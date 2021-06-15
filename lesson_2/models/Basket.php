<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $session_id;
    public $user_id;
    public $goods_id;
    public $count;
    public $price;


    protected function getTableName()
    {
        return 'basket';
    }


}

