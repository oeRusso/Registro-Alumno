<?php

class NuevoModel extends ModelGestor
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(array $data)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO alumnos (matricula, nombre, apellidos) VALUES (:matricula, :nombre, :apellidos)');
            $query->execute(['matricula' => $data['matricula'], 'nombre' => $data['nombre'], 'apellidos' => $data['apellidos']]);
            // echo "Insertar datos";

            return true;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            // echo "Ya existe esa matricula";

            return false;
        }
    }
}
