<?php

namespace MYAPI\Delete;
include_once __DIR__ . '/../DataBase.php';
use MYAPI\DataBase as DataBase;

class Delete extends Database{
    public function __construct($based, $usuario='root', $contrasena='mendoza21:)') {
        parent::__construct($based, $usuario, $contrasena);
    }

    public function delete($id){
        $data = array(
            'status'  => 'error',
            'message' => 'La consulta falló'
        );
        // SE VERIFICA HABER RECIBIDO EL ID
        if( isset($id) ) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
            if ( $this->conexion->query($sql) ) {
                $data['status'] =  "success";
                $data['message'] =  "Producto eliminado";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
        $this->data = json_encode($data, JSON_PRETTY_PRINT);
    }
}

?>