<?php

//require_once '../classes/Usuario.php';
require 'src/classes/Usuario.php';

class UsuarioController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $usuario = new Usuario($this->db);
        $usuario->nombre = $data['nombre'];
        $usuario->email = $data['email'];
        $usuario->contrasena = $data['contrasena'];
        $usuario->fecha_nacimiento = $data['fecha_nacimiento'];
        $usuario->genero = $data['genero'];
        $usuario->foto_perfil = $data['foto_perfil'];
        $usuario->id_rol = $data['id_rol'];
        return $usuario->create();
    }

    public function read() {
        $usuario = new Usuario($this->db);
        return $usuario->read();
    }

    public function update($id, $data) {
        $usuario = new Usuario($this->db);
        $usuario->nombre = $data['nombre'];
        $usuario->email = $data['email'];
        $usuario->contrasena = $data['contrasena'];
        $usuario->fecha_nacimiento = $data['fecha_nacimiento'];
        $usuario->genero = $data['genero'];
        $usuario->foto_perfil = $data['foto_perfil'];
        $usuario->id_rol = $data['id_rol'];
        return $usuario->update($id);
    }

    public function delete($id) {
        $usuario = new Usuario($this->db);
        return $usuario->delete($id);
    }
}
?>