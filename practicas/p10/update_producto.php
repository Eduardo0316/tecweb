<?php
$conf = true;
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];
$eliminado = 0;
/* MySQL Conexion*/
$link = mysqli_connect('localhost', 'root', 'mendoza21:)', 'marketzone');
// Chequea coneccion
if($link === false){
die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}
// Ejecuta la actualizacion del registro
$sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio=$precio, detalles='$detalles', unidades=$unidades, imagen='$imagen' WHERE id=$id";
if(mysqli_query($link, $sql)){
echo "Registro actualizado.";
$conf = true;
} else {
echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
$conf = false;
}
// Cierra la conexion
mysqli_close($link);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <meta charset="utf-8" >
        <title>Productos registro</title>
    </head>
    <body>
        <?php if($conf == true):?>
            <h2>Detalles del producto: </h2>
            <ul>
                <li>Nombre: <?php echo $nombre;?></li>
                <li>Marca: <?php echo $marca;?></li>
                <li>Modelo: <?php echo $modelo;?></li>
                <li>Precio: <?php echo $precio;?></li>
                <li>Detalles: <?php echo $detalles;?></li>
                <li>Unidades: <?php echo $unidades;?></li>
                <li>Imagen: <?php echo $imagen;?></li>
            </ul>
            <?php else: ?>
        <p><?php echo 'Sucedio un error en el registro con el nombre o modelo del producto' ?></p>
    <?php endif; ?>
    </body>
</html>