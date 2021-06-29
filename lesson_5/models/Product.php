<?php

namespace app\models;

class Product extends DBModel
{
    protected $id;
    protected $filename;
    protected $name;
    protected $description;
    protected $price;
    protected $likes;

    protected $props = [
        'filename' => false,
        'name' => false,
        'description' => false,
        'price' => false,
        'likes' => false
    ];

    public function __construct($filename = null, $name = null, $description = null, $price = null, $likes = 0)
    {
        $this->filename = $filename;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->likes = $likes;
    }

    protected static function getTableName()
    {
        return 'products';
    }

}

