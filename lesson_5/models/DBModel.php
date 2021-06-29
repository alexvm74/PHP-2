<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
    abstract protected static function getTableName();

    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }

    public static function getWhere($name, $value)
    {
        //TODO собрать запрос вида WHERE 'login' = 'admin'

        $tableName = static::getTableName();
  
        $params[":{$name}"] = $name;
        $params[":{$value}"] = $value;
        //$sql = "SELECT * FROM `{$tableName}` WHERE `:name` = ':value'";

        // a так работает (без $params):
        $sql = "SELECT * FROM `{$tableName}` WHERE `{$name}` = '{$value}'"; 
        var_dump($sql);
        //var_dump($params);
        //die();
        //var_dump(Db::getInstance()->execute($sql, $params));
        return Db::getInstance()->execute($sql);
          
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        //return DB::getInstance()->queryOne($sql, ['id' => $id]);
        return DB::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";

        return DB::getInstance()->queryAll($sql);
    }

    protected function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $columns[] = $key;
        }

        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $tableName = static::getTableName();
        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$value})";
        DB::getInstance()->execute($sql, $params);
        // возвращаем последний id:
        $this->id = DB::getInstance()->lastInsertId();
        return $this;
    }

    protected function update()
    {
        $params = [];
        $colums = [];

        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $colums[] .= "`{$key}` = :{$key}";
            $this->props[$key] = false;
        }

        $colums = implode(", ", $colums);
        $tableName = static::getTableName();
        $params['id'] = $this->id;
        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        // возвращаем кол-во затронутых строк:
        return Db::getInstance()->execute($sql, $params);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";
        // возвращаем кол-во затронутых строк:
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function save()
    {
        if (is_null($this->id)) {
            return $this->insert(); // возвращаем последний id
        } else {
            return $this->update(); // возвращаем кол-во затронутых строк
        }
    }
}
