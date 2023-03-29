<?php

class DatabaseGestor
{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    public function connect()
    {

        try {
            $connection = "mysql:host=$this->host;dbname=$this->db";
           
            $options = [
                PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES      => false,
            ];
            // ESTAS CONFIGURACIONES PDO PARA QUE SIRVEN?


            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
            // EN DONDE SE CREO LA CLASE PDO? Y ESOS PARAMETROS QUE LE PASO YA NO LOS LEERIA AL INSTANCIARSE EL OBJETO?

        } catch (PDOException $e) {
            print_r('error connection:' . $e->getMessage());
        }
    }
}
