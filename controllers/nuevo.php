<?php

class nuevo extends ControllerGestor
{

    public function  __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    {
        $this->view->render('nuevo/index');
    }

    public function registrarAlumno()
    {
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];

        // aca tenes que poner otras validacione mas seguras (AÑADIR)

        $mensaje = "";

        if ($this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellidos' => $apellidos])) {
            $mensaje = "Nuevo alumno creado";
        } else {
            $mensaje = "La matricula ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();

        // aca hay un problema q no me imprime el mensaje , empezar a depurar con bardumps
    }
}
