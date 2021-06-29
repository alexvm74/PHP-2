<?php

namespace app\models;


class Order extends DBModel
{
    protected $id;
    protected $name;
    protected $phone;
    protected $session_id;

    protected $props = [
        'name' => false,
        'phone' => false,
        'session_id' => false
    ];

    public function __construct($name = null, $phone = null, $session_id = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
    }

    protected static function getTableName()
    {
        return 'orders';
    }
}
