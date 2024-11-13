<?php

namespace MYAPI;

abstract class DataBase
{
    protected $conexion;
    protected $data;    

    public function __construct($based,$usuario='root',$contrasena='mendoza21:)'){
        $this -> conexion = @mysqli_connect(
            'localhost',
            $usuario,
            $contrasena,
            $based
        );
    }

    public function getData(){
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}

?>