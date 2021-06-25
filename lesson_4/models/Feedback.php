<?php

namespace app\models;


class Feedback extends DBModel
{
    public $id;
    public $name;
    public $feedback;
    public $id_products;

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
