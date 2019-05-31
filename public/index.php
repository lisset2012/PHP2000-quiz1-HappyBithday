<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;

// Define some absolute path
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Register an autoloader
$loader = new Loader();
$loader->registerDirs([
	APP_PATH . '/controllers/',
	APP_PATH . '/models/',
]);
$loader->register();

// Create a DI
$di = new FactoryDefault();

// Setup the view component
$di->set('view', function () {
	$view = new View();
	$view->setViewsDir(APP_PATH . '/views/');
	return $view;
});

$application = new Application($di);

try {
	$response = $application->handle();
	$response->send();
} catch (\Exception $e) {
	echo 'Exception: ', $e->getMessage();
}