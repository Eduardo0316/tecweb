// JSON BASE A MOSTRAR EN FORMULARIO
$(document).ready(function(){
    let edit = false;
    console.log("jQwery is working");
    fetchProducts();

    $('#search').keyup(function(e) {
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: 'product-search.php',
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
                    //$('#product-result').show();
                }
            });
        }
    });

    $('#product-form').submit(function(e){
        let productoJsonString = $('#description').val();
        // SE CONVIERTE EL JSON DE STRING A OBJETO
        let finalJSON = JSON.parse(productoJsonString);
        const postData = {
            nombre: $('#name').val(),
            marca: finalJSON['marca'],
            modelo: finalJSON['modelo'],
            precio: finalJSON['precio'],
            detalles: finalJSON['detalles'],
            unidades: finalJSON['unidades'],
            imagen: finalJSON['imagen'],
            id: $('#productId').val()
        };

        //VALIDACIONES
        var alertas = [];
        let nombre = postData.nombre;
        let marca = postData.marca;
        let modelo = postData.modelo;
        let precio = postData.precio;
        let detalles = postData.detalles;
        let unidades = postData.unidades;
        let imagen = postData.imagen;
            // Validar nombre
        if (nombre.length === 0 || nombre.length > 100) {
            alertas.push('El nombre es requerido y debe tener un máximo de 100 caracteres');
        }
    
        // Validar precio
        if (isNaN(precio) || precio <= 99.99) {
            alertas.push('El precio es requerido para el registro y debe ser mayor a 99.99');
        }
    
        // Validar unidades
        if (isNaN(unidades) || unidades < 0) {
            alertas.push('Las unidades son requeridas y deben ser mayores a 0.');
        }
    
        // Validar modelo
        if (modelo === "" || !alf(modelo) || modelo > 25) {
            alertas.push('El modelo es requerido y debe tener menos de 25 caracteres alfanuméricos.');
        }
    
        // Validar marca
        if (marca === "") {alertas.push('La marca del producto es requerida para el registro');}
    
        // Validar detalles
        if (detalles.length > 250) {
            alertas.push('Los detalles no deben exceder los 250 caracteres');
        }
    
        // Validar imagen
        if (imagen === "") {
            imagen = "img/imagen.png";
        }
    
        // Errores
        if (alertas.length > 0) {
            alert(
            "No se realizó la inserción del producto debido a:\n" +
                alertas.join("\n")
            );
            return;
        }

        let url = edit === false ? 'product-add.php' : 'product-edit.php';

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
        url: 'product-list.php',
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
        $.post('product-delete.php', {id}, function(response){
            fetchProducts();
        });
    }
});

$(document).on('click', '.product-item', function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('productoId');
    $.post('product-single.php', {id}, function(response) {
        const producto = JSON.parse(response);
        $('#name').val(producto.nombre);
        var finJson = {
            precio: Number(producto.precio),
            unidades: Number(producto.unidades),
            modelo: producto.modelo,
            marca: producto.marca,
            detalles: producto.detalles || baseJSON.detalles,
            imagen: producto.imagen || baseJSON.imagen,
        };
        
        $("#description").val(JSON.stringify(finJson, null, 2));
        $("#productId").val(producto.id);
        edit = true;
    });
  });

});

var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
}

function alf(texto){
    let patron = /^[A-Xa-z0-9]+$/;
    return patron.test(texto);
}