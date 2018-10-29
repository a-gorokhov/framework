<?php

/**
 * Кусок взят на просторах интернета и переписан под себя
 */

function class_autoload($class_name)
{
    $file = APP . 'base' . _DS_ . $class_name . '.php';
    if (file_exists($file) == false) {
        return false;
    }
    require_once($file);
}

function controller_autoload($class_name)
{
    $file = ROOT . 'controllers' . _DS_ . $class_name . '.php';
    if (file_exists($file) == false) {
        return false;
    }
    require_once($file);
}

function model_autoload($class_name)
{
    $file = ROOT . 'models' . _DS_ . $class_name . '.php';
    if (file_exists($file) == false) {
        return false;
    }
    require_once($file);
}

spl_autoload_register('class_autoload');
spl_autoload_register('controller_autoload');
spl_autoload_register('model_autoload');

define('_DS_', DIRECTORY_SEPARATOR);
define('APP', dirname(__FILE__) . _DS_);
define('ROOT', APP . '..' . _DS_ . '..' . _DS_);
define('VIEWS', ROOT . 'views' . _DS_);
