<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $productos = new MYAPI\Delete\Delete('marketzone');
    $productos->delete( $_POST['id'] );
    echo $productos->getData();
?>