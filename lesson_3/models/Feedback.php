<?php

namespace app\models;


class Feedback extends Model
{
    public $id;
    public $name;
    public $feedback;
    public $id_products;

    public function __construct($name = '', $feedback = '', $id_products = '')
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->id_products = $id_products;
    }

    public function getTableName()
    {
        return 'feedback';
    }
}
