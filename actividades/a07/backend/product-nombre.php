<?php
    use ACT\PRODUCTOS\Products;
    require_once __DIR__.'/myapi/Products.php';

    $productos = new Products('marketzone');
    $productos->singleByName($_GET);
    echo $productos->getData();
?>