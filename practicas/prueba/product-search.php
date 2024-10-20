<?php
include('database.php');
$search = $_POST['search'];
if(!empty($search)){
    $query = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre 
    LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
    $result = mysqli_query($conexion, $query);
    if(!$result){
        die('Error de consulta'.mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'nombre' => $row['nombre'],
            'detalles' => $row['detalles'],
            'id' => $row['id']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>