<?php

ob_start();

define('DOC_ROOT', realpath(dirname(__FILE__) . '/../'));
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

require '../core/autoloader.php';
spl_autoload_register("autoloader::load");

$environment = config::get('environment', 'live');
$timezone = config::get('environment', $environment, 'timezone');
date_default_timezone_set($timezone);

$app = new Bootstrap();
$app->setController('welcome');
$app->init();

ob_flush();
