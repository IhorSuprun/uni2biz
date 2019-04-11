<?php

namespace app\core;

class Route {

    static public function start() {
        $controller_name = 'Users';
        $action_name = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller_name = ucfirst($routes[1]);
        }
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }
        $model_name = 'app\models\Model_' . $controller_name;
        $controller_name = 'app\controllers\Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        $model_file = $model_name . '.php';
        $model_path = $model_file;

        if (file_exists($model_path)) {
            include $model_path;
        }
        $controller_file = $controller_name . '.php';
        $controller_path = $controller_file;
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            Route::ErrorPage404();
        }
        $controller = new $controller_name;
        if (method_exists($controller, $action_name)) {
            $add_params = array();
            foreach ($routes as $key => $route) {
                if ($key <= 2) {
                    continue;
                }
                $add_params[] = $route;
            }
            if (!empty($add_params)) {

                $controller->$action_name($add_params);
            } else {
                $controller->$action_name();
            }
        } else {
            Route::ErrorPage404();
        }
    }

    static public function ErrorPage404() {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        exit('page not found');
        //TODO красивая страница 404
    }

    static public function redirect($path) {
        $domen_name = $_SERVER['HTTP_ORIGIN'];
        header('Location: ' . $domen_name . $path);
    }

}
