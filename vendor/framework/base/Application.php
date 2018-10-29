<?php

namespace framework\base;

use framework\db\Connection;

/**
 * Class Application Базовый класс приложения
 */
class Application extends Singleton
{
    public static $DB = null;

    /**
     * Application constructor.
     *
     * @param array $config
     *
     * @throws \Exception
     */
    function __construct($config = [])
    {
        if (isset($config['db']) && !isset(self::$DB)) {
            self::$DB = (new Connection($config['db']))->open();
        }
    }

    /**
     * @throws \Exception
     */
    function run()
    {
        Route::gi()->parse();
        $controller = self::gi(Route::gi()->controller . 'Controller');
        if (!method_exists($controller, 'action' . Route::gi()->action)) {
            throw new \Exception('Method ' . Route::gi()->action . ' not exist');
        }
        try{
            echo $controller->__call('action' . Route::gi()->action);
        }catch (\Exception $exception){

        }
    }
}