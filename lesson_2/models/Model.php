<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;

    abstract protected function getTableName();

    public function __construct(Db $db)
    {
        $this->db = $db;
    }


    public function getOne($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";

        echo $this->db->queryOne($sql);
    }
    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";

        echo $this->db->queryAll($sql);
    }

    // не доделал пока.....
    public function insert($data=[]) {
        $str = ''; $val = '';
        var_dump($data);
        foreach($data as $key=>$value){
            $str .= "{$key}, ";
            $val .= "{$value}, ";
        }
        var_dump($str);
        var_dump($val);

        //$sql = "INSERT INTO {$this->getTableName()} (`session_id`, `user_id`, `goods_id`, `price`) VALUES ('{$session}', '{$userId}', '{$id}', '{$price}')"
    }

    public function update() {

    }

    public function delete() {

    }

}