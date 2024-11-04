<?php
include('database.php');
if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];
    $query = "INSERT INTO productos VALUES (null, '$nombre', 
    '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen', 0)";
    $resultado = mysqli_query($conexion, $query);
    if(!$resultado){
        echo 'Producto agregado con exito';
        die('La consulta fallo');
    }
    else{echo 'Producto agregado con exito';}
}
?>