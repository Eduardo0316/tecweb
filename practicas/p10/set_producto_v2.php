<?php
$conf = true;

$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];
$eliminado = 0;

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'mendoza21:)', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}
$cons = "SELECT * FROM productos WHERE nombre = '$nombre' OR modelo = '$modelo'";
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
        <p><?php echo 'Sucedio un error en el registro con el nombre o modelo del producto' ?></p>
    <?php endif; ?>
    </body>
</html>