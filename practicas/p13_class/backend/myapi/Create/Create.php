<?php

namespace MYAPI\Create;
include_once __DIR__ ."/../DataBase.php";
use MYAPI\DataBase as Database;

class Create extends Database{
    public function __construct($based, $usuario='root', $contrasena='mendoza21:)') {
        parent::__construct($based, $usuario, $contrasena);
    }

    public function add($producto){
        $data = array(
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $cons = "SELECT * FROM productos WHERE nombre = '{$producto->nombre}' AND eliminado = 0";
        $result = $this->conexion->query($cons);
        
        if ($result->num_rows == 0) {
            $this->conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$producto->nombre}', '{$producto->marca}', '{$producto->modelo}', {$producto->precio}, '{$producto->detalles}', {$producto->unidades}, '{$producto->imagen}', 0)";
            if($this->conexion->query($sql)){
                $data['status'] =  "success";
                $data['message'] =  "Producto agregado";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
        }

        $result->free();
        // Cierra la conexion
        $this->conexion->close();
    
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        $this->data = json_encode($data, JSON_PRETTY_PRINT);        
    }
}

?>