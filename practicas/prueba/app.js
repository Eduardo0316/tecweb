// JSON BASE A MOSTRAR EN FORMULARIO
$(document).ready(function(){
    console.log("jQwery is working");

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
            imagen: finalJSON['imagen']
        };
        $.post('product-add.php', postData, function(response){
            console.log(response);
            $('#product-form').trigger('reset');
            init();
        });
        e.preventDefault();
    });

    $.ajax({
        url: 'product-list.php',
        type: 'GET',
        succes: function(response){
            console.log(response);
        }
    })
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