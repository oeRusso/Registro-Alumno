<?php

class ErrorController extends ControllerGestor
{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje= "Hubo un error en la solicitud o no existe la pagina";
        $this->view->render('error/index');
        // solucionado, puede continuar :D, ESTABA MAL Q DENTRO DE LA CARPETA MAIN TENIA LA DE EROR POR ESO NO ME CARGABA
        // echo "<p>Error al cargar el recurso</p>";
    }
}
