<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $productos = new MYAPI\Read\Read('marketzone');
    $productos->singleByName($_GET);
    echo $productos->getData();
?>