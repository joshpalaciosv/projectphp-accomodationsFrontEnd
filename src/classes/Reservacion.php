<?php

class Reservacion {
    private $db;

    public $id;
    public $id_alojamiento;
    public $id_usuario;
    public $fecha_inicio;
    public $fecha_fin;
    public $precio_total;
    public $estado;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear una nueva reservación
    public function create() {
        try {
            $data = [
                'id_alojamiento' => $this->id_alojamiento,
                'id_usuario' => $this->id_usuario,
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'precio_total' => $this->precio_total,
                'estado' => $this->estado
            ];
            $result = $this->db->from('Reservaciones')->insert($data)->execute();
            echo "Reservación creada exitosamente: " . json_encode($result) . "\n";
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . "\n";
            return false;
        }
    }

    // Leer todas las reservaciones
    public function read() {
        try {
            $records = $this->db->from('Reservaciones')->select('*')->execute()->getResult();
            return $records;
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Actualizar una reservación
    public function update($id) {
        try {
            $data = [
                'id_alojamiento' => $this->id_alojamiento,
                'id_usuario' => $this->id_usuario,
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'precio_total' => $this->precio_total,
                'estado' => $this->estado
            ];
            $result = $this->db->from('Reservaciones')->update($data)->eq('id', $id)->execute();
            echo "Reservación actualizada exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Eliminar una reservación
    public function delete($id) {
        try {
            $result = $this->db->from('Reservaciones')->delete()->eq('id', $id)->execute();
            echo "Reservación eliminada exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }
}
?>