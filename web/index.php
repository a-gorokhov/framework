<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/framework/App.php');

$config = require(__DIR__ . '/../config/web.php');

$app = (new framework\base\Application($config))->run();
