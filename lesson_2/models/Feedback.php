<?php
namespace app\models;


class Feedback extends Model
{
    public $id;
    public $name;
    public $feedback;
    public $id_goods;

    public function getTableName() {
        return 'feedback';
    }


}