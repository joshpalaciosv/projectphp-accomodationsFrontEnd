<?php

class AlojamientoFavorito {
    private $db;

    public $id_usuario;
    public $id_alojamiento;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo alojamiento favorito
    public function create() {
        try {
            $data = [
                'id_usuario' => $this->id_usuario,
                'id_alojamiento' => $this->id_alojamiento
            ];
            $result = $this->db->from('AlojamientosFavoritos')->insert($data)->execute();
            echo "Alojamiento favorito creado exitosamente: " . json_encode($result) . "\n";
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . "\n";
            return false;
        }
    }

    // Leer todos los alojamientos favoritos de un usuario
    public function read($id_usuario) {
        try {
            $records = $this->db->from('AlojamientosFavoritos')->select('*')->eq('id_usuario', $id_usuario)->execute()->getResult();
            return $records;
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Eliminar un alojamiento favorito
    public function delete($id_usuario, $id_alojamiento) {
        try {
            $result = $this->db->from('AlojamientosFavoritos')->delete()->eq('id_usuario', $id_usuario)->eq('id_alojamiento', $id_alojamiento)->execute();
            echo "Alojamiento favorito eliminado exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }
}
?>