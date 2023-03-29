<?php

include_once 'models/alumno.php';

class ConsultaModel extends ModelGestor
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {

        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT*FROM alumnos");

            while ($row = $query->fetch()) {

                $item = new Alumno();
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];

                array_push($items, $item);
            }

            return $items;
            // SIEEEMPRE DESPUES DE UNA ITERACION DE OBJETOS DEBE HABER UN RETORNO

        } catch (PDOException $e) {
            return [];
        }
        var_dump($items);
    }

    public function getById($id)
    {

        $item = new Alumno();
        $query = $this->db->connect()->prepare("SELECT*FROM alumnos WHERE matricula =  :matricula");

        try {
            $query->execute(['matricula' => $id]);
            while ($row = $query->fetch()) {
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];
            }

            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare("UPDATE alumnos SET nombre = :nombre, apellidos = :apellidos WHERE matricula = :matricula");

        try {

            $query->execute([
                'matricula' => $item['matricula'],
                'nombre' => $item['nombre'],
                'apellidos' => $item['apellidos']
            ]);

            // var_dump($item);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM alumnos WHERE matricula = :id");

        try {

            $query->execute([
                'id'=>$id
            ]);

            // var_dump($item);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
