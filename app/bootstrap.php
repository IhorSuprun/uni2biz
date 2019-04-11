<?php
session_start();
use app\core\Route;
spl_autoload_register(function($className) {
    $path = $className . '.php';
    if (file_exists($path)) {
	include_once $path;
	return true;
    }
    return false;
});
//require_once 'core/Model.php';
//require_once 'core/View.php';
//require_once 'core/Controller.php';
//require_once 'core/Route.php';
Route::start(); // запускаем маршрутизатор

