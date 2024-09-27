function getDatos(){
    var nombre = window.prompt("Nombre: ", "");
    var edad = prompt("Edad: ", "");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: ' + nombre + "</h3>";

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: ' + edad + "</h3>";
}

//Ejercicio 
function ej2(){
    var div = document.getElementById('ej2');
    div.innerHTML='<h4> Hola Mundo </h4>';
}
//Ejercicio 
function ej3(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;
    var div = document.getElementById('ej3');

    div.innerHTML=nombre+'<br>'+edad+'<br>'+altura+'<br>'+casado;
}
//Ejercicio 4
function ej4(){
    var nombre;
    var edad;
    var div = document.getElementById('ej4');
    
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    div.innerHTML='Hola '+nombre+', así que tienes '+edad+' años';
}
//Ejercicio 5
function ej5(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
    var div = document.getElementById('ej5');

    div.innerHTML='La suma es '+suma+'<br>El producto es '+producto;
}
//Ejercicio 6
function ej6(){
    var nombre;
    var nota;
    var div = document.getElementById('ej6');
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    if (nota>=4) {
        div.innerHTML=nombre+' esta aprobado con un  '+nota;
    }
}
//Ejercicio 
//Ejercicio 