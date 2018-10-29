<?php

namespace framework\base;


class Route extends Singleton
{
    public $action     = 'index';
    public $controller = 'Site';

    /**
     * Парсер запроса
     */
    function parse()
    {
        //Парсим запрос
        $request = substr($this->getRequestUri(), 1, strlen($this->getRequestUri()));
        if($request == '/') {
            return;
        }

        if($this->getQueryString() !== ''){
            $request = substr($request, 0, strpos($request, $this->getQueryString()) - 1);
        }

        $requestArray = explode('/', $request);

        if ($requestArray[0] !== '') {
            //Получаем название контроллера
            $this->controller = ucfirst(mb_strtolower(array_shift($requestArray)));
        }
        if ($requestArray[0] !== '') {
            //Получаем экшен
            $this->action = $requestArray[0];
        }
    }

    public function getQueryString()
    {
        return isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
    }

    public function getRequestUri()
    {
        return isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    }

}