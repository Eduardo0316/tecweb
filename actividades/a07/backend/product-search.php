<?php
    use ACT\PRODUCTOS\Products;
    require_once __DIR__.'/myapi/Products.php';

    $productos = new Products('marketzone');
    $productos->search( $_GET['search'] );
    echo $productos->getData();
?>