<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $productos = new MYAPI\Read\Read('marketzone');
    $productos->single( $_POST);
    echo $productos->getData();
?>