<?php

class Ayuda extends ControllerGestor{

    public function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('ayuda/index');
    }
}

?>