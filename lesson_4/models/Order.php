<?php

namespace app\models;


class Order extends DBModel
{
    public $id;
    public $name;
    public $phone;
    public $session_id;

    public function __construct($name = null, $phone = null, $session_id = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
    }

    public static function getTableName()
    {
        return 'orders';
    }
}
