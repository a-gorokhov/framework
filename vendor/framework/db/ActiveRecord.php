<?php

namespace framework\db;

use framework\base\Model;
use framework\web\Application;

class ActiveRecord extends Model
{
    public static function tableName()
    {
        return '';
    }

    public static function className()
    {
        return get_called_class();
    }

    public static function getDb()
    {
        return Application::$DB;
    }

    public static function findAll()
    {
        $PDOStatement = static::getDb()->prepare('SELECT * FROM ' . static::tableName());
        if (!$PDOStatement->execute()) {
            throw new \Exception('Not found table "' . static::tableName() . "'");
        }
        $results = $PDOStatement->fetchAll();
        $return    = [];
        $className = static::className();
        foreach ($results as $result) {
            $return[] = new $className($result);
        }
        return $return;
    }

    public function delete()
    {

    }
}