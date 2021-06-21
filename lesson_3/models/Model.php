<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    abstract protected function getTableName();

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";

        //return DB::getInstance()->queryOne($sql, ['id' => $id]);
        return DB::getInstance()->queryOneObject($sql, ['id' => $id], get_called_class());
    }
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";

        return DB::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $keys = '';
        $values = '';
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $keys .= "`{$key}`, ";
            $values .= "'{$value}', ";
        }
        $keys = substr_replace($keys, '', -2);
        $values = substr_replace($values, '', -2);
        $sql = "INSERT INTO `{$this->getTableName()}` ({$keys}) VALUES ({$values})";
        var_dump($sql);
        DB::getInstance()->execute($sql); // без передачи $params
        $this->id = DB::getInstance()->lastInsertId();
        var_dump($this);

        /* // вариант из разбора дз:
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = $key;
        }
        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$this->getTableName()}`({$columns}) VALUES ({$value})";
        var_dump($sql);
        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();
        */

        return $this;
    }

    public function update()
    {
    }

    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = {$this->id}";
        var_dump($sql);
        return Db::getInstance()->execute($sql); // без передачи $params
    }
}
