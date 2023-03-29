<?php

class Consulta extends ControllerGestor
{

  public function  __construct()
  {
    parent::__construct();
    $this->view->alumnos = [];
  }

  function render()
  {

    $alumnos = $this->model->get();
    $this->view->alumnos = $alumnos;
    $this->view->render('consulta/index');
  }

  function verAlumno($param = null)
  {
    $idAlumno = $param[0];
    $alumnos = $this->model->getById($idAlumno);

    session_start();
    $_SESSION['id_verAlumno'] = $alumnos->matricula;
    $this->view->alumnos = $alumnos; //EL ARRAY QUE DEFINIMOS AL PRINCIPIO ES IGUAL A LA VARIABLE QUE TRAE TODA LA CONSULTA
    $this->view->mensaje = "";
    $this->view->render('consulta/detalle');
  }

  function actualizarAlumno()
  {
    session_start();
    $matricula = $_SESSION['id_verAlumno'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    unset($_SESSION['id_verAlumno']);

    if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellidos' => $apellidos])) {
      // ACTUALIZAR ALUMNO EXITO
      $alumnos = new Alumno();
      $alumnos->matricula = $matricula;
      $alumnos->nombre = $nombre;
      $alumnos->apellidos = $apellidos;

      $this->view->alumnos = $alumnos;
      $this->view->mensaje = "alumno actualizado correctamente";
    } else {
      $this->view->mensaje = "No se pudo actualizar el alumno";
    }

    $this->view->render('consulta/detalle');
  }

  function eliminarAlumno($param = null)
  {
    $matricula = $param[0];

    if ($this->model->delete($matricula)) {
      
      $this->view->mensaje = "alumno Eliminado correctamente";
    } else {
      $this->view->mensaje = "No se pudo eliminar el alumno";
    }

    $this->render(); 
  }
}
