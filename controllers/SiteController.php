<?php

class SiteController extends \framework\base\Controller
{
    /**
     * @return false|string
     * @throws ReflectionException
     * @throws Throwable
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}