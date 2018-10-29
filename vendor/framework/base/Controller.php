<?php

namespace framework\base;

/** Основной класс контроллера */

class Controller
{
    /**
     * @param       $methodName
     * @param array $args
     *
     * @return mixed
     * @throws \Exception
     */
    function __call($methodName, $args = [])
    {
        if (is_callable([$this, $methodName])) {
            return call_user_func_array([$this, $methodName], $args);
        } else {
            throw new \Exception('In controller ' . get_called_class() . ' method ' . $methodName . ' not found!');
        }
    }

    /**
     * Получение имени контроллера
     * P.S. можно оптимизировать кусок чтоб убрат рефлексию, но так удобнее
     *
     * @return null|string|string[]
     * @throws \ReflectionException
     */
    public function getControllerName()
    {
        return preg_replace('/Controller/', '', (new \ReflectionClass($this))->getShortName());
    }

    /**
     * Рендер вьюхи
     *
     * @param       $viewName
     * @param array $params
     *
     * @return false|string
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function render($viewName, $params = [])
    {
        $filePath = VIEWS . strtolower($this->getControllerName()) . _DS_ . $viewName . '.php';
        if(!file_exists($filePath)){
            throw new \Exception('File '.$viewName.' not exist');
        }
        return $this->renderPhpFile($filePath, $params);
    }

    /**
     * Взял из Yii2
     *
     * @param       $_file_
     * @param array $_params_
     *
     * @return false|string
     * @throws \Throwable
     */
    public function renderPhpFile($_file_, $_params_ = [])
    {
        $_obInitialLevel_ = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        extract($_params_, EXTR_OVERWRITE);
        try {
            require $_file_;
            return ob_get_clean();
        } catch (\Exception $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        } catch (\Throwable $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }
}