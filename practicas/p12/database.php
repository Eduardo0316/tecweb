<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'mendoza21:)',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        //echo "Base de datos conectada";
        die('¡Base de datos NO conextada!');
    }
?>