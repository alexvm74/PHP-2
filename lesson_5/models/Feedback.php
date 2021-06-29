<?php

namespace app\models;


class Feedback extends DBModel
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $id_products;
    
    protected $props = [
        'name' => false,
        'feedback' => false,
        'id_products' => false
    ];

    public function __construct($name = null, $feedback = null, $id_products = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->id_products = $id_products;
    }

    public static function getTableName()
    {
        return 'feedback';
    }
}
