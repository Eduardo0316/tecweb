<?php
$conf = true;

$nombre = $_GET['nombre_producto'];
$marca  = $_GET['marca_producto'];
$modelo = $_GET['modelo_producto'];
$precio = $_GET['precio_producto'];
$detalles = $_GET['detalles_producto'];
$unidades = $_GET['unidades_producto'];
$imagen   = 'imagen.png';
$eliminado = 0;

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'mendoza21:)', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}
$cons = "SELECT * FROM productos WHERE nombre = '$nombre' OR marca = '$marca' OR modelo = '$modelo'";
$res = $link->query($cons);

if($res->num_rows > 0){
    $conf = FALSE;
}
else{
    /** Crear una tabla que no devuelve un conjunto de resultados */
    //$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', '{$eliminado}')";
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
    VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
    if ( $link->query($sql) ) 
    {
        echo 'Producto insertado con ID: '.$link->insert_id;
        $conf = TRUE;
    }
    else
    {
        echo 'El Producto no pudo ser insertado =(';
        $conf = FALSE;
    }
}

$link->close();
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
        <p><?php echo 'Sucedio un error en el registro con el nombre, marca o modelo del producto' ?></p>
    <?php endif; ?>
    </body>
</html>