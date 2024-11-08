<?php
namespace ACT\PRODUCTOS;    
abstract class database{
    protected $conexion;

    public function __construct($based, $usuario, $contrasena) {
        $this->conexion = @mysqli_connect(
            'localhost',
            $usuario,
            $contrasena,
            $based
        );
    
        /**
         * NOTA: si la conexión falló $conexion contendrá false
         **/
        if(!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }
}
?>