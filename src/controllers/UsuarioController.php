<?php

//require_once '../classes/Usuario.php';
require 'src/classes/Usuario.php';

use PHPSupabase\Service;

class UsuarioController {
    private $db;

    //public function __construct($db) {
    public function __construct() {
        $apiKey = getenv('VITE_SUPABASE_ANON_KEY');
        $apiUrl = getenv('VITE_SUPABASE_URL');
        $supabasePublicKey = getenv('SUPABASE_JWT_SECRET');

        $service = new Service($apiKey, $apiUrl);
        $db = $service->initializeDatabase('usuarios');
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