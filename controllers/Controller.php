<?php
class Controller {

    public function __construct() {

    }

    public function loadModel(string $model) {
        require_once(ROOT.'models/'.$model.'.php');

        return new $model;
    }

    public function render(string $fichier, array $data=[]) {
        $class = strtolower(get_class($this));
        $dir = preg_replace("#controller#", "", $class);

        ob_start();
        require_once(ROOT.'views/'.$dir.'/'.$fichier.'.php');

        $content = ob_get_clean();

        require_once(ROOT.'views/layout/layout.php'); 

    }
}