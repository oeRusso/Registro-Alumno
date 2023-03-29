
<?php

class ControllerGestor{

    public function __construct()
    {

        // echo "<p>Controlador base PARCE</p>";
        $this->view = new ViewsGestor();
        
    }

    public function loadModel($model){

        $url= 'models/'. $model .'model.php';

        if (file_exists($url)) {
            require $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}
