<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" >
        <title>Registro de productos</title>
    </head>
    <body>
        <form action="set_producto_v2.php">
        <h2>Registro de productos</h2>
        <fieldset>
            <legend>Ingresa los datos de tu producto</legend>
            <ul>
                <li><label for="form-nombre">Nombre del producto:</label> <input type="text" name="nombre_producto" id="form-nombre" value="<?= $_GET['nombre'] ?>"></li>
                <li><label for="form-marca">Marca del producto:</label> <input type="text" name="marca_producto" id="marca-marca" value="<?= $_GET['marca'] ?>"></li>
                <li><label for="form-modelo">Modelo del producto:</label> <input type="text" name="modelo_producto" id="form-modelo" value="<?= $_GET['modelo'] ?>"></li>
                <li><label for="form-precio">Precio del producto: </label><input type="number" name="precio_producto" value="<?= $_GET['precio'] ?>" placeholder="1.0" step="1" min="0" max="1000"/></li>
                <li><label for="form-detalles">Detalles:</label><br><textarea name="detalles_producto" rows="3" cols="40" id="form-detalles" value="<?= $_GET['detalles'] ?>" placeholder="Descripción general del producto"></textarea></li>
                <li><label for="form-unidades">Unidades a registrar:</label><input type="number" id="form-unidades" value="<?= $_GET['unidades'] ?>" name="unidades_producto" min="1" max="1000"/></li>
                <li><label for="form-imagen">Imagen:</label><input type="text" name="imagen_producto" id="form-imagen" value="<?= $_GET['imagen'] ?>"></li>
            </ul>
        </fieldset>
        <p>
            <input type="submit" value="Enviar">
            <input type="reset">
        </p>    
        </form>
        
    </body>
</html>