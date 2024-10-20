// JSON BASE A MOSTRAR EN FORMULARIO
$(document).ready(function(){
    console.log("jQwery is working");

    $('#search').keyup(function(e) {
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
                
            }
        })
    })
});




var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
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