<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $filename;
    public $name;
    public $description;
    public $price;
    public $likes;


    protected function getTableName()
    {
        return 'goods';
    }


}

