<?php

class Main extends ControllerGestor
{

  public function  __construct()
  {

    parent::__construct();
   
    // echo "<p>Nuevo controlador  MAINNNN</p>";
  }

  function render()
  {
    $this->view->render('main/index');
  }

  public function saludo()
  {
    echo "<p>Estas ejecutando el metodo saludo</p>";
  }
}
