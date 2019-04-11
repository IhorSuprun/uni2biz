<?php
namespace app\core;
class View {

    public $template_view='main.php';
    public $content_view;
    
    function render() {
        include 'app/views/templates/' . $this->template_view;
    }

}
