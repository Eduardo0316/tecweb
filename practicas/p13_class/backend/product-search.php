<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $productos = new MYAPI\Read\Read('marketzone');
    $productos->search( $_GET['search'] );
    echo $productos->getData();
?>