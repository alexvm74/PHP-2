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


    public function __construct($filename = null, $name = null, $description = null, $price = null, $likes = 0)
    {
        $this->filename = $filename;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->likes = $likes;
    }

    protected function getTableName()
    {
        return 'products';
    }

}

