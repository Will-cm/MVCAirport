<?php


/*
 * referencia al archivo PHP que conecta a la Base de Datos
 */
require_once('../app/database/connection.php');


/*
 * validamos si entra como parametro las variables ['controller'] y ['action']
 */
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    /*
     * caso contrario que no ingrese ningun parametro o este mal escrito entonces
     * se redireccionara automaticamente a 'pages' y 'home'
     */
    $controller = 'aeropuerto';  //pages
    $action = 'index';   //home
}

/*
 * cargamos el archivo (layout.php) que contendra la plantilla del proyecto
 * es decir la cabezera de la pagina, el menu y el pie de pagina.
 */
require_once('../app/routes.php');

?>