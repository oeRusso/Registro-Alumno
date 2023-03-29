<?php

class ViewsGestor{


    public function __construct()
    {
    //  echo "<p>Vista base perri</p>";
    }

    public function render($nombre){

          require 'views/' . $nombre . '.php';

    }
}

?>



