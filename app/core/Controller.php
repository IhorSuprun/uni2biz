<?php

namespace app\core;

abstract class Controller {

    /**
     *
     * @var Model 
     */
    public $model;
    /**
     *
     * @var View 
     */
    public $view;

    public function __construct() {
        $this->view = new View();
    }

    abstract public function action_index();

}
