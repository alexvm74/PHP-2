<?php

namespace app\models;


class Order extends Model
{
    public $id;
    public $name;
    public $phone;
    public $session_id;

    public function __construct($name = '', $phone = '', $session_id = '')
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
    }

    public function getTableName()
    {
        return 'orders';
    }
}
