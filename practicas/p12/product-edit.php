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
    $id = $_POST['id'];
    $query = "UPDATE productos SET nombre= '$nombre', marca= '$marca', 
    modelo= '$modelo', precio=$precio, detalles= '$detalles', 
    unidades= $unidades,imagen= '$imagen' WHERE id= '$id'";
    $resultado = mysqli_query($conexion, $query);
    if(!$resultado){
        die('La actualización fallo');
    }
    else{echo 'Producto actualizado con exito';}
}
?>