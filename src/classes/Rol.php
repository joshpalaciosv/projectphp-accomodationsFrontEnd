<?php

class Rol {
    private $db;

    public $id;
    public $nombre;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo rol
    public function create() {
        try {
            $data = [
                'nombre' => $this->nombre
            ];
            $result = $this->db->from('Roles')->insert($data)->execute();
            echo "Rol creado exitosamente: " . json_encode($result) . "\n";
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . "\n";
            return false;
        }
    }

    // Leer todos los roles
    public function read() {
        try {
            $records = $this->db->from('Roles')->select('*')->execute()->getResult();
            return $records;
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Actualizar un rol
    public function update($id) {
        try {
            $data = [
                'nombre' => $this->nombre
            ];
            $result = $this->db->from('Roles')->update($data)->eq('id', $id)->execute();
            echo "Rol actualizado exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Eliminar un rol
    public function delete($id) {
        try {
            $result = $this->db->from('Roles')->delete()->eq('id', $id)->execute();
            echo "Rol eliminado exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }
}
?>