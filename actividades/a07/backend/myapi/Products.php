<?php
namespace ACT\PRODUCTOS;

use ACT\PRODUCTOS\database;
require_once __DIR__ . '/database.php';

class Products extends database{

    private $data;

    public function __construct($based, $usuario='root', $contrasena='mendoza21:)') {
        $this->data = array();
        parent::__construct($based, $usuario, $contrasena);
    }

    public function getData() {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

    public function add($producto){
        $data = array(
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );

        $jsonOBJ = json_decode(json_encode($producto, JSON_FORCE_OBJECT));
        $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
        $result = $this->conexion->query($sql);
        if(!empty($producto)) {
            // SE TRANSFORMA EL STRING DEL JASON A OBJETO
            json_decode(json_encode($producto, JSON_FORCE_OBJECT));
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
            
            
            if ($result->num_rows == 0) {
                $this->conexion->set_charset("utf8");
                $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
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
            $this->data = json_encode($data, JSON_PRETTY_PRINT);
        }
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

    public function edit($producto){
        $data = array(
            'status'  => 'error',
            'message' => 'No se encontró el producto'
        );
    
        if(isset($producto)) {
            // SE TRANSFORMA EL STRING DEL JSON A OBJETO
            //print_r($producto);
            $jsonOBJ = json_decode(json_encode($producto));
            //$jsonOBJ = $producto;
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
            $this->conexion->set_charset("utf8");
            $sql = "UPDATE productos set nombre='$jsonOBJ->nombre', marca='$jsonOBJ->marca', modelo='$jsonOBJ->modelo', precio=$jsonOBJ->precio, detalles='$jsonOBJ->detalles', unidades=$jsonOBJ->unidades, imagen='$jsonOBJ->imagen' where id=$jsonOBJ->id ";
            ///*
            if($this->conexion->query($sql)){
                $data ['status'] =  "success";
                $data ['message'] =  "Producto modificado";
            } else {
                $data ['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            //*/
            // Cierra la this->conexion
            $this->conexion->close();
        }
        //$this->data = json_encode($data, JSON_PRETTY_PRINT);
    }

    public function list(){
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
            // SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $this->data[$num][$key] = $value;
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function search($search){

        // SE VERIFICA HABER RECIBIDO EL ID
        if(isset($search)){
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            if ( $result = $this->conexion->query($sql) ) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $this->data[$num][$key] = $value;
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }

    public function single($producto) {
        $id = $producto['id'];
        if( isset($id) ) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            if ( $result = $this->conexion->query("SELECT * FROM productos WHERE id = {$id}") ) {
                // SE OBTIENEN LOS RESULTADOS
                $row = $result->fetch_assoc();
    
                if(!is_null($row)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($row as $key => $value) {
                        $this->data[$key] = $value;
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
        
    }

    public function singleByName($producto){
        if( isset($producto['nombre']) ) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "SELECT * FROM productos WHERE nombre LIKE '{$nombre}' and eliminado = 0";
            if ( $result = $conexion->query($sql) ) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if(!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $data[$num][$key] = utf8_encode($value);
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($conexion));
            }
            $conexion->close();
        }
    }
}
?>