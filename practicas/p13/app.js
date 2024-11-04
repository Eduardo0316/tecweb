// JSON BASE A MOSTRAR EN FORMULARIO
$(document).ready(function(){
    let edit = false;
    let actID;
    let repNom = false;
    console.log("jQwery is working");
    fetchProducts();

    $('#search').keyup(function(e) {
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: 'backend/product-search.php',
                type: 'POST',
                data: { search },
                success: function(response){
                    let productos = JSON.parse(response);
                    let template = '';
                    productos.forEach(producto => {
                        template += `<li>
                            ${producto.nombre}
                        </li>`
                    });
                    $('#container').html(template);
                    document.getElementById("product-result").className = "card my-4 d-block";
                }
            });
        }
    });

    $('#form-nombre').keyup(function(){
        if ($('#form-nombre').val().trim()){
            let nombre = $('#form-nombre').val().trim();
            $.ajax({
                url: 'backend/product-nombre.php',
                type: 'GET',
                data: { nombre },
                success: function(response){
                    let productos = JSON.parse(response);
                    if(!$.isEmptyObject(productos)){
                        if((actID==productos[0].id)){
                            repNom=false;
                        } else {
                            $('#nombre-estado').text('El nombre ya existe en la base de datos');
                            repNom= true;
                        }
                    }
                    else {
                        repNom= false;
                    }
                    
                }
            });
        }
    });

    $('#form-nombre').keyup(function(){valNom = validarNombre(); });
    function validarNombre(){
        let nombre = $('#form-nombre').val();
        if (repNom){ 
            return false;
        }
        else{
            if (nombre.length === 0 || nombre.length > 100) {
                $('#nombre-estado').text('El nombre es requerido y debe tener un máximo de 100 caracteres');
                return false;
            }
            else{
                $('#nombre-estado').text('Valido');
                return true;
            }
        }
        
    }

    $('#form-modelo').keyup(function(){valMod = validarModelo(); });
    function validarModelo(){
        let modelo = $('#form-modelo').val();
        if (modelo === "" || !alf(modelo) || modelo.length > 25) {
            $('#modelo-estado').text('El modelo es requerido y debe tener menos de 25 caracteres alfanuméricos');
            return false;
        }
        else{
            $('#modelo-estado').text('Valido');
            return true;
        }
    }

    $('#form-precio').keyup(function(){valPre = validarPrecio(); });
    function validarPrecio(){
        let precio = $('#form-precio').val();
        if (isNaN(precio) || precio <= 99.99) {
            $('#precio-estado').text('El precio es requerido para el registro y debe ser mayor a 99.99');
            return false;
        }
        else{
            $('#precio-estado').text('Valido');
            return true;
        }
    }
    
    $('#form-detalles').keyup(function(){valDet = validarDetalles(); });
    function validarDetalles(){
        let detalles = $('#form-detalles').val();
        if (detalles.length > 250) {
            $('#detalles-estado').text('Los detalles no deben exceder los 250 caracteres');
            return false;
        }
        else{
            $('#detalles-estado').text('Valido');
            return true;
        }
    }

    $('#form-unidades').keyup(function(){valUni = validarUnidades(); });
    function validarUnidades(){
        let unidades = $('#form-unidades').val();
        if (isNaN(unidades) || unidades < 0) {
            $('#unidades-estado').text('Las unidades son requeridas y deben ser mayores a 0');
            return false;
        }
        else{
            $('#unidades-estado').text('Valido');
            return true;
        }
    }

    $('#product-form').submit(function(e){        
        const postData = {
            nombre: $('#form-nombre').val(),
            marca: $('#form-marca').val(),
            modelo: $('#form-modelo').val(),
            precio: $('#form-precio').val(),
            detalles: $('#form-detalles').val(),
            unidades: $('#form-unidades').val(),
            imagen: $('#form-imagen').val()||'img/imagen.png',
            id: $('#productId').val()
        };
        
        valNom = validarNombre();
        valMod = validarModelo();
        valPre = validarPrecio();
        valUni = validarUnidades();
        valDet = validarDetalles();
        valido = valNom & valMod & valPre & valUni & valDet;
    
        // Errores
        if (!valido) {
            alert("No se realizó la inserción del producto ya que hay campos sin validar");
            return;
        }

        let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';

        $.post(url, postData, function(response){
            fetchProducts();
            $('#product-form').trigger('reset');
            init();
            alert(response);
        });
        e.preventDefault();
    });

function fetchProducts(){
    $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function(response){
            let productos = JSON.parse(response);
            let template = "";
            productos.forEach(producto => {
                let descripcion = '';
                descripcion += '<li>precio: '+producto.precio+'</li>';
                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                descripcion += '<li>marca: '+producto.marca+'</li>';
                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                template += `
                    <tr productoId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>
                            <a href="#" class="product-item">${producto.nombre}</a>
                        </td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="producto-delete btn btn-danger">
                                Eliminar
                            </button>  
                        </td>
                    </tr>
                `;
            });
            $('#products').html(template);
        }
    });
}

$(document).on('click', '.producto-delete', function(){
    if(confirm('¿Estas seguro de eliminar el producto?')){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productoId');
        $.post('backend/product-delete.php', {id}, function(response){
            fetchProducts();
        });
    }
});

$(document).on('click', '.product-item', function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('productoId');
    $.post('backend/product-single.php', {id}, function(response) {
        const producto = JSON.parse(response);
        $('#form-nombre').val(producto.nombre);
        $('#form-modelo').val(producto.modelo);
        $('#form-precio').val(producto.precio);
        $('#form-detalles').val(producto.detalles);
        $('#form-unidades').val(producto.unidades);
        $('#form-imagen').val(producto.imagen);
        $("#productId").val(producto.id);
        edit = true;
        actID = $('#productId').val();
    });
  });

});

function init(){
    $('#nombre-estado').text('');
    $('#modelo-estado').text('');
    $('#precio-estado').text('');
    $('#detalles-estado').text('');
    $('#unidades-estado').text('');
}

function alf(texto){
    let patron = /^[A-Za-z0-9]+$/;
    return patron.test(texto);
}