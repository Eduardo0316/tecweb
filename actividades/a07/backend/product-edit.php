<?php
use ACT\PRODUCTOS\Products;
require_once __DIR__.'/myapi/Products.php';
$productos = new Products('marketzone');
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