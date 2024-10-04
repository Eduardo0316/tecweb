function mostrarFechaHora() {
    var fecha
    var div = document.getElementById("ej1");
    fecha=new Date();
    div.innerHTML = 'Hoy es '+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear()+'<br>'+
    'Es la hora'+fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds();
}

function ej2(){
    var div = document.getElementById('ej2');
    function cargar(sueldos) {
        var f;
        for(f=0;f<sueldos.length;f++) {
        var v;
        v=prompt('Ingrese sueldo:','');
        sueldos[f]=parseInt(v);
        }
    }
    function calcularGastos(sueldos) {
        var total=0;
        var f;   
        for(f=0; f<sueldos.length; f++) {
            total=total+sueldos[f];
            }
        div.innerHTML = 'Listado de sueldos<br>';
        for(f=0;f<sueldos.length;f++) {
            div.innerHTML = div.innerHTML+sueldos[f]+'<br>';
        }
        div.innerHTML = div.innerHTML+'Total de gastos en sueldos:'+total;
    }
    var sueldos;
    sueldos = new Array(5);
    cargar(sueldos);
    calcularGastos(sueldos);
}

function ej3(){
    var div = document.getElementById('ej3');
    function mostrarFecha(meses,dias) {
        var num;
        num = prompt('Ingrese número de mes:','');
        num = parseInt(num);
        div.innerHTML = 'Corresponde al mes:'+meses[num-1]+'<br>'+'Tiene '+dias[num-1]+' días';
    }
    var meses = new Array(12);
    meses[0]='Enero';
    meses[1]='Febrero';
    meses[2]='Marzo';
    meses[3]='Abril';
    meses[4]='Mayo';
    meses[5]='Junio';
    meses[6]='Julio';
    meses[7]='Agosto';
    meses[8]='Septiembre';
    meses[9]='Octubre';
    meses[10]='Noviembre';
    meses[11]='Diciembre';
    var dias = new Array(12);
    dias[0]=31;
    dias[1]=28;
    dias[2]=31;
    dias[3]=30;
    dias[4]=31;
    dias[5]=30;
    dias[6]=31;
    dias[7]=31;
    dias[8]=30;
    dias[9]=31;
    dias[10]=30;
    dias[11]=31;
    mostrarFecha(meses,dias);
}

function ej4(){
    var div = document.getElementById('ej4');
    var selec = prompt('Ingresa un valor entre 1 y 10','');
    selec = parseInt(selec);
    var num = parseInt(Math.random()*10)+1;
    if ( num == selec )
        div.innerHTML='Ganó el número que se sorteó es el '+ num;
    else
        div.innerHTML='Lo siento se sorteó el valor '+num+' y eligiste el '+selec;
}

function ej5(){
    var div = document.getElementById('ej5');
    
    var cadena = prompt('Ingresa una cadena:','');
    div.innerHTML='La cadena ingresada es:'+cadena+'<br>'+'La cantidad de caracteres son:'+cadena.length+'<br>'+
    'El primer carácter es:'+cadena.charAt(0)+'<br>'+'Los primeros 3 caracteres son:'+cadena.substring(0,3)+'<br>';
    if (cadena.indexOf('hola')!=-1)
        div.innerHTML =div.innerHTML+'Se ingresó la subcadena hola';
        else
        div.innerHTML =div.innerHTML+'No se ingresó la subcadena hola';
        
        div.innerHTML=div.innerHTML+'<br>'+'La cadena convertida a mayúsculas es:'+cadena.toUpperCase()+
        '<br>'+'La cadena convertida a minúsculas es:'+cadena.toLowerCase()+'<br>';
}