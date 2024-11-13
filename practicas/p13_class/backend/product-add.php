<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $productos = new MYAPI\Create\Create('marketzone');
    $productos->add( json_decode( json_encode($_POST) ) );
    echo $productos->getData();
?>