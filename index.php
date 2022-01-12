<?php
session_start();
// error_log(print_r($_SERVER, 1));

define('ROOT', str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));
// error_log('ROOT : '.ROOT);

$params = explode("/", $_GET['action']);

// error_log(print_r($params, 1));
if (isset($params[1])) {
    $controller = $params[0]."Controller";
    $method = $params[1];

     error_log("ctrl : ".$controller);
     error_log("meth : ".$method);

    require_once(ROOT.'controllers/'.$controller.'.php');
    $oController = new $controller();

    if(method_exists($oController, $method)) {
        $oController->$method();
    } else {
        http_response_code(404);
        echo "la page recherchée n'existe pas";
    }
} else {
    require_once(ROOT.'/controllers/loginController.php');

    $oController = new loginController();
    $oController->login();
}