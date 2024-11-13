<?php

require_once __DIR__ . '/vendor/autoload.php';
$productos = new MYAPI\Update\Update('marketzone');
$productos->edit( json_decode( json_encode($_POST) ) );
echo $productos->getData();
/*
    if(!$resultado){
        die('La actualización fallo');
    }
    else{echo 'Producto actualizado con exito';}
}
    */
?>