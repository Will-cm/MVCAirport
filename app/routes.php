<?php


function call($controller, $action) {

    //echo $controller. ' ---- ';

    //echo $action;

    $file_controller = 'controllers/' . $controller . '_controller.php';
    //echo $file_controller;
    require_once($file_controller);///aqui se hace existencia de las CLASS
    switch($controller) {
        case 'pages'://principal
            $controller = new PagesController();
            break;        
        case 'aeropuerto':
            require_once('models/aeropuerto.php');///All()
            $controller = new AeropuertoController();///ultilizando el Modelo
            break;
        case 'vuelo':
            require_once('models/vuelo.php');///All()
            $controller = new VueloController();///ultilizando el Modelo
            break;
        case 'planVuelo':
            require_once('models/planvuelo.php');///All()
            require_once('models/vuelo.php');///All()
            require_once('models/aeropuerto.php');///All()
            $controller = new PlanVueloController();///ultilizando el Modelo
            break;
        case 'registers':
            require_once('models/register.php');///All()
            $controller = new RegistersController();///ultilizando el Modelo
            break;
        case 'login':
            $controller = new LoginsController();///ultilizando el Modelo
            break;
    }

    $controller->{ $action }();  //llama una accion que es:public function index() de telefonos_controller
}

// agregar la entrada para el nuevo controlador y sus acciones
$controllers = array(
    'pages' => ['home', 'error404', 'error500'],    
    'aeropuerto' => ['index', 'guardar', 'actualizar','eliminar'],
    'vuelo' => ['index', 'guardar', 'actualizar','eliminar'],
    'planVuelo' => ['index', 'guardar', 'actualizar','eliminar'],
    'registers' => ['index','guardar'],
    'login' => ['index'],
    ///agragar los cu y sus acciones
    );

if (array_key_exists($controller, $controllers)) {  //no tocar
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error500');  //no existe esa ACTION   500
    }
} else {
    call('pages', 'error404');   //no existe el CONTROLADOR  404
}
?>