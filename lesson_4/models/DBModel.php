<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
    abstract protected static function getTableName();

    public static function getLimit($limit) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);

    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        //return DB::getInstance()->queryOne($sql, ['id' => $id]);
        return DB::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return DB::getInstance()->queryAll($sql);
    }

    protected function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = $key;

        }
        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$value})";

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    protected function update()
    {
        $params = [];
        $colums = [];

        foreach ($this as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $colums[] .= "`{$key}` = :{$key}";
        }
        $colums = implode(", ", $colums);
        $tableName = static::getTableName();
        $params['id'] = $this->id;
        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        //var_dump($sql);
        //var_dump($params);
        //die();
        Db::getInstance()->execute($sql, $params);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function save() {
        if (is_null($this->id)) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }
}