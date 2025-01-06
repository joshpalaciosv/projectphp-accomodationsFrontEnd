<?php

class Alojamiento {
    private $db;

    public $id;
    public $nombre;
    public $descripcion;
    public $tipo;
    public $capacidad;
    public $bano_privado;
    public $direccion;
    public $ciudad;
    public $pais;
    public $precio_por_noche;
    public $calificacion_promedio;
    public $fotos;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo alojamiento
    public function create() {
        try {
            $data = [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'tipo' => $this->tipo,
                'capacidad' => $this->capacidad,
                'bano_privado' => $this->bano_privado,
                'direccion' => $this->direccion,
                'ciudad' => $this->ciudad,
                'pais' => $this->pais,
                'precio_por_noche' => $this->precio_por_noche,
                'calificacion_promedio' => $this->calificacion_promedio,
                'fotos' => $this->fotos
            ];
            $result = $this->db->insert($data);
            echo "Alojamiento creado exitosamente: " . json_encode($result) . "\n";
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . "\n";
            return false;
        }
    }

    // Leer todos los alojamientos
    public function read() {
        try {
            $records = $this->db->from('Alojamientos')->select('*')->execute()->getResult();
            return $records;
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Actualizar un alojamiento
    public function update($id) {
        try {
            $data = [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'tipo' => $this->tipo,
                'capacidad' => $this->capacidad,
                'bano_privado' => $this->bano_privado,
                'direccion' => $this->direccion,
                'ciudad' => $this->ciudad,
                'pais' => $this->pais,
                'precio_por_noche' => $this->precio_por_noche,
                'calificacion_promedio' => $this->calificacion_promedio,
                'fotos' => $this->fotos
            ];
            $result = $this->db->from('Alojamientos')->update($data)->eq('id', $id)->execute();
            echo "Alojamiento actualizado exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }

    // Eliminar un alojamiento
    public function delete($id) {
        try {
            $result = $this->db->from('Alojamientos')->delete()->eq('id', $id)->execute();
            echo "Alojamiento eliminado exitosamente: " . json_encode($result) . "\n";
        } catch (Exception $e) {
            echo 'Error: ' . $this->db->getError() . "\n";
        }
    }
}
?>