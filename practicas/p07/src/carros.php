<?php

$array = ['Matricula' => $matricula,
            ['Auto' => ['Aarca' => $marca, 'Modelo' => $modelo, 'Tipo' => $tipo]],
            ['Propietario' => ['Nombre' => $nombre, 'Ciudad' => $ciudad, 'Dirección' => $direccion]]];


$matrs = array();
$conf = TRUE;
$matricula = $_POST['matricula'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];

for($i=0;$i<=count($matrs);$i++){
    if($matricula == $matrs[$i]){echo 'Esa matrícula ya existe, no se puede agregar'; $conf = FALSE;}
}

if($conf == TRUE){

}
?>