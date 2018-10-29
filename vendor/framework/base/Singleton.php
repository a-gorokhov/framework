<?php

namespace framework\base;

abstract class Singleton
{
    private static $_instances = [];

    public static function getInstance($className = false)
    {
        $callClass = $className ? $className : get_called_class();
        if (class_exists($callClass)) {
            if (!isset(self::$_instances[$callClass])) {
                self::$_instances[$callClass] = new $callClass();
            }
            $instance = self::$_instances[$callClass];
            return $instance;
        } else {
            throw new \Exception('Class ' . $className . '  no exist!');
        }
    }

    public static function gI($className = false)
    {
        return self::getInstance($className);
    }

    final private function __clone()
    {
    }

    private function __construct()
    {
    }
}