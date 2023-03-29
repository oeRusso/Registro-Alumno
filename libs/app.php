<?php
require_once 'controllers/error.php';
class App
{

    function __construct()
    {
        // echo "<h1>Nueva App</h1>";

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // sino se ingresa ninguna clase en la url te cargara por defecto el controlador main
        if (empty($url[0])) {
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        $archivoController = 'controllers/' . $url[0] . '.php';
        // lo que pasa aca es que el le concatena la url en la posicion 0 por que despues por la url es el primer parametro que el escribe para que le cargue el controlador, escribe main y ahi ya le carga, es un juego que lo oscila entre codigo y url. sino le pasas ese nombre por la url no te va cargar, si so is debes pasarle main

        if (file_exists($archivoController)) {
            require_once $archivoController;

            // se inicializa el controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // elementos del arreglo
            $nparam = sizeof($url);

            if ($nparam > 1) {
                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else {
                    $controller->{$url[1]}();
                }
            }else {
                    $controller->render();
                }
            } else {

                $controller = new ErrorController();
            }
        }
    }
