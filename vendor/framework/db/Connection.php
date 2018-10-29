<?php

namespace framework\db;

use framework\base\Singleton;

class Connection extends Singleton
{
    public static $pdo      = null;
    public        $dsn      = null;
    public        $username = null;
    public        $password = null;
    public        $options  = [];

    function __construct($config = [])
    {
        foreach ($config as $key => $value) {
            if (!$this->$key) {
                $this->$key = $value;
            }
        }
    }

    public function createPdoInstance()
    {
        if (self::$pdo !== null) {
            return self::pdo;
        }

        return new \PDO($this->dsn, $this->username, $this->password, $this->options);
    }

    public function open()
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        try {
            self::$pdo = $this->createPdoInstance();
            return self::$pdo;
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage(), (int)$e->getCode());
        }
    }

    public function close()
    {
        if (self::$pdo !== null) {
            self::$pdo = null;
        }
    }
}