<?php

class Usuario {
    private $db;

    public $id;
    public $nombre;
    public $email;
    public $contrasena;
    public $fecha_nacimiento;
    public $genero;
    public $foto_perfil;
    public $id_rol;


    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo usuario
    public function create() {
        try {
            $data = [
                'nombre' => $this->nombre,
                'email' => $this->email,
                'contrasena' => $this->contrasena,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'genero' => $this->genero,
                'foto_perfil' => $this->foto_perfil,
                'id_rol' => $this->id_rol
            ];
            $result = $this->db->insert($data);
            echo "\n"."Usuario creado exitosamente: " . json_encode($result) . "\n";
            return true;
        } catch (Exception $e) {
            //echo 'Error: ' . $e->getMessage() . "\n";
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Leer todos los usuarios
    public function read() {
        try {
            //$records = $this->db->select('*')->execute()->getResult();
            $records = $this->db->fetchAll();
            return $records;
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Actualizar un usuario
    public function update($id) {
        try {
            $data = [
                'nombre' => $this->nombre,
                'email' => $this->email,
                'contrasena' => $this->contrasena,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'genero' => $this->genero,
                'foto_perfil' => $this->foto_perfil,
                'id_rol' => $this->id_rol
            ];
            //$result = $this->db->update($data)->eq('id', $id)->execute();
            $result = $this->db->update($id, $data);
            echo "Usuario actualizado exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Eliminar un usuario
    public function delete($id) {
        try {
            //$result = $this->db->delete()->eq('id', $id)->execute();
            $result = $this->db->delete($id);
            echo "Usuario eliminado exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }
}
?>