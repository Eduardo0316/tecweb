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
//Ejercicio 7
function ej7(){
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    var div = document.getElementById('ej7');
    if (num1>num2) {
        div.innerHTML=' El mayor es '+num1;
    }
    else {
        div.innerHTML=' El mayor es '+num2;
    }
}
//Ejercicio 8
function ej8(){
    var nota1,nota2,nota3;
    var div = document.getElementById('ej8');

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        div.innerHTML='Aprobado';
        }
    else {
        if (pro>=4) {
            div.innerHTML='Regular';
        }
        else {
            div.innerHTML='Reprobado';
        }
    }
}
//Ejercicio 9
function ej9(){
    var valor;
    var div = document.getElementById('ej9');
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
    case 1: div.innerHTML='uno';

    break;

    case 2: div.innerHTML='dos';

    break;

    case 3: div.innerHTML='tres';

    break;

    case 4: div.innerHTML='cuatro';

    break;

    case 5: div.innerHTML='cinco';

    break;

    default:div.innerHTML='debe ingresar un valor comprendido entre 1 y 5.';
    }
}
//Ejercicio 10
function ej10(){
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '' );
    switch (col) {
    case 'rojo': document.bgColor='#ff0000';

    break;

    case 'verde': document.bgColor='#00ff00';

    break;

    case 'azul': document.bgColor='#0000ff';

    break;

    }
}
//Ejercicio 11
function ej11(){
    var x;
    var div = document.getElementById('ej11');
    x=1;
    while (x<=100) {
        div.innerHTML=div.innerHTML + x + '<br>';
        x=x+1;
    }
}
//Ejercicio 12
function ej12(){
    var x=1;
    var suma=0;
    var valor;
    var div = document.getElementById('ej12');
    while (x<=5){
    valor = prompt('Ingresa el valor:', '');
    valor = parseInt(valor);
    suma = suma+valor;
    x = x+1;
    }
    div.innerHTML="La suma de los valores es "+suma+"<br>";
}
//Ejercicio 13
function ej13(){
    var valor;
    var div = document.getElementById('ej13');
    do{
    valor = prompt('Ingresa un valor entre 0 y 999:', '');
    valor = parseInt(valor);
    div.innerHTML=div.innerHTML+'El valor '+valor+' tiene ';
    if (valor<10)
        div.innerHTML=div.innerHTML+'Tiene 1 dígitos';
    else
    if (valor<100) {
        div.innerHTML=div.innerHTML+'Tiene 2 dígitos';
    }
    else {
        div.innerHTML=div.innerHTML+'Tiene 3 dígitos';
    }
    div.innerHTML=div.innerHTML+'<br>';       
    }while(valor!=0);
}
//Ejercicio 14
function ej14(){
    var f;
    var div = document.getElementById('ej14');
    for(f=1; f<=10; f++)
    {
        div.innerHTML=div.innerHTML+f+" ";
    }
}
//Ejercicio 15
function ej15(){
    var div = document.getElementById('ej15');
    div.innerHTML="Cuidado<br>";
    div.innerHTML=div.innerHTML+"Ingresa tu documento correctamente<br>";
    div.innerHTML=div.innerHTML+"Cuidado<br>";
    div.innerHTML=div.innerHTML+"Ingresa tu documento correctamente<br>";
    div.innerHTML=div.innerHTML+"Cuidado<br>";
    div.innerHTML=div.innerHTML+"Ingresa tu documento correctamente<br>";
}
//Ejercicio 16
function mostrarMensaje() {
    var div = document.getElementById('ej16');
    div.innerHTML=div.innerHTML+"Cuidado<br>";
    div.innerHTML=div.innerHTML+"Ingresa tu documento correctamente<br>";
}
function ej16(){
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}
    
//Ejercicio 17
function mostrarRango(x1,x2) {
    var inicio;
    var div = document.getElementById('ej17');
    div.innerHTML=' ';
    for(inicio=x1; inicio<=x2; inicio++) {
        div.innerHTML=div.innerHTML+inicio+' ';
    }
}
function ej17(){
    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2);
}
//Ejercicio 18
function convertirCastellano(x) {
    if(x==1)
    return "uno";
    else
    if(x==2)
    
    return "dos";
    else
    if(x==3)
    return "tres";
    else
    if(x==4)
    
    return "cuatro";
    
    else
    
    if(x==5)
    return "cinco";
    else
    return "valor incorrecto";
    
}
    
function ej18(){
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    var div = document.getElementById('ej18');
    div.innerHTML=r;
}
//Ejercicio 19
function convertirCastellano(x) {
    switch (x) {
    case 1: return "uno";
    case 2: return "dos";
    case 3: return "tres";
    case 4: return "cuatro";
    case 5: return "cinco";
    default: return "valor incorrecto";
    }
}
//Ejercicio 19
function ej19(){
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    var div = document.getElementById('ej19');
    div.innerHTML=r;
}