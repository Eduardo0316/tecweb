<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" >
        <title>Registro de productos</title>
    </head>
    <body>
        <form 
        id="formulario"
        action="http://localhost/tecweb/practicas/p10/update_producto.php"
        method="post"> 
        <h2>Registro de productos</h2>
        <fieldset>
            <legend>Ingresa los datos de tu producto</legend>
            <ul>
            <li><label for="form-id">Id:</label><input type="text" name="id" id="id" value="<?= $_GET['id'] ?>" readonly></li>
            <li><label for="form-nombre">Nombre del producto:</label> <input type="text" name="nombre" id="form-nombre" value="<?= $_GET['nombre'] ?>" required></li>
                <li>
                    <label for="marca" value="<?= $_GET['marca'] ?>">Marca del producto:</label>
                    <select name="marca" id="marca">
                        <option value="Sanrio">Sanrio</option>
                        <option value="Peanuts">Peanuts</option>
                        <option value="Freddy's">Freddy's</option>
                        <option value="Anime">Anime</option>
                        <option value="Minecraft">Minecraft</option>
                        <option value="Angry Birds">Angry Birds</option>
                    </select>
                </li>
                <li><label for="form-modelo">Modelo del producto:</label> <input type="text" name="modelo" id="form-modelo" value="<?= $_GET['modelo'] ?>" required></li>
                <li><label for="form-precio">Precio del producto: </label><input type="number" name="precio" value="<?= $_GET['precio'] ?>" placeholder="1.0" step="1" min="0" max="1000" required/></li>
                <li><label for="form-detalles">Detalles:</label><br><input type="text" name="detalles" id="form-detalles" value="<?= $_GET['detalles'] ?>"></li>
                <li><label for="form-unidades">Unidades a registrar:</label><input type="number" id="form-unidades" value="<?= $_GET['unidades'] ?>" name="unidades" min="1" max="1000" required/></li>
                <li><label for="form-imagen">Imagen:</label><input type="text" name="imagen" id="form-imagen" value="<?= $_GET['imagen'] ?>"></li>
            </ul>
        </fieldset>
        <div id="div1"></div>
        <p>
            <input type="submit" value="Enviar" id="verificar">
            <input type="reset">
        </p>    
        </form>

        <script type="text/javascript">
            document.getElementById("formulario").addEventListener("submit", function(event) {
                if (!verif()) { event.preventDefault(); }
            });

            function alf(texto){
                let patron = /^[A-Xa-z0-9]+$/;
                return patron.test(texto);
            }
            function verif(){ 
                var confi = true;
                var div = document.getElementById('div1');
                div.innerHTML = '';
                var nomb=document.getElementById('nombre').value;
                var mode=document.getElementById('modelo').value;
                var prec=document.getElementById('precio').value;
                var deta=document.getElementById('detalles').value;
                var unid=document.getElementById('unidades').value;
                var imag=document.getElementById('imagen').value;
                
                var t1='', t2='', t3='', t4='', t5='',t6='';
                if ((nomb.length == 0) || (nomb.length > 100)) {
                    t1 = 'El nombre es requerido y debe tener un máximo de 100 caracteres <br>';
                    confi = false;
                }
                if ((mode.length == 0) || (mode.length > 25) || (!alf(mode))){
                    t3 = 'El modelo es requerido y debe tener menos de 25 caracteres alfanuméricos. <br>';confi = false;}
                if ((prec.value < 99.99) || (prec.length == 0)){ 
                    t4 = 'El precio es requerido para el registro y debe ser mayor a 99.99. <br>';confi = false;}
                if (detalles.length > 250){
                    t5 = 'Los detalles no deben exceder los 250 caracteres';confi = false;}
                if ((unid.value < 0) || (unid.length == 0)){ 
                    t6 = 'Las unidades son requeridas y deben ser mayores a 0. <br>';confi = false;}

                if(imag.value == ''){document.getElementById("imagen").value = "img/imagen.png";};
                div.innerHTML=t1+t3+t4+t5+t6;
                return confi;
            }
        </script>
    </body>
</html>