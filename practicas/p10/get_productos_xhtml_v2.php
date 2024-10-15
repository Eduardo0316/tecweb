<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

if(isset($_GET['tope']))
{
    $tope = $_GET['tope'];
}
else
{
    die('Parámetro "tope" no detectado...');
}

if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'mendoza21:)', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = utf8_encode($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();

        /** Se devuelven los datos en formato JSON */
	}
?>

<head>
<meta charset="UTF-8">
        <link rel="stylesheet"
              href= "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
              integrity= "sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
              crossorigin="anonymous" />
    <script>
            function show(){
                // se obtiene el id de la fila donde está el botón presinado
                var rowId = event.target.parentNode.parentNode.id;

                // se obtienen los datos de la fila en forma de arreglo
                var data = document.getElementById(rowId).querySelectorAll(".row-data");
                /**
                querySelectorAll() devuelve una lista de elementos (NodeList) que 
                coinciden con el grupo de selectores CSS indicados.
                (ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

                En este caso se obtienen todos los datos de la fila con el id encontrado
                y que pertenecen a la clase "row-data".
                */
                var id = rowId;
                var nombre = data[0].innerHTML;
                var marca = data[1].innerHTML;
                var modelo = data[2].innerHTML;
                var precio = data[3].innerHTML;
                var detalles = data[4].innerHTML;
                var unidades = data[5].innerHTML;
                var imagen = data[6].querySelector('img').src;

                send2form(nombre, marca, modelo, precio, detalles, unidades, imagen, id);
            }

            
        </script>
</head>
<body>
    <h3>PRODUCTOS</h3><br/>
    <?php if( isset($row) ) : ?>

    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Precio</th>
            <th scope="col">Detalles</th>
            <th scope="col">Unidades</th>
            <th scope="col">Imagen</th>
            <th scope="col">Submit</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row){ ?>
        <tr id='<?= $row['id'] ?>'>
            <th scope="row"><?= $row['id'] ?></th>
            <td class="row-data"><?= $row['nombre'] ?></td>
            <td class="row-data"><?= $row['marca'] ?></td>
            <td class="row-data"><?= $row['modelo'] ?></td>
            <td class="row-data"><?= $row['precio'] ?></td>
            <td class="row-data"><?= $row['detalles'] ?></td>
            <td class="row-data"><?= $row['unidades'] ?></td>
            <td class="row-data" ><img src='<?= $row['imagen'] ?>' ></td>
            <td><input type="button" value="Modificar" onclick="show()" /></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php endif; ?>
    <script>
        function send2form(nombre, marca, modelo, precio, detalles, unidades, imagen, id) {     //form) { 
            var urlForm = "http://localhost/tecweb/practicas/p10/formulario_productos_v3.php";
            var propId = "id=" + id;
            var propName = "nombre=" + nombre;
            var propMarca = "marca=" + marca;
            var propModelo = "modelo=" + modelo;
            var propPrecio = "precio=" + precio;
            var propDetalles = "detalles=" + detalles;
            var propUnidades = "unidades=" + unidades;
            var propImagen = "imagen=" + imagen;
            window.open(urlForm+"?"+propId+"&"+propName+"&"+propMarca+"&"+propModelo+"&"+propPrecio+"&"+propDetalles+"&"+propUnidades+"&"+propImagen);
        }
    </script>
</body>
</html>
