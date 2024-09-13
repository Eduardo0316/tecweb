<?php
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
if(($sexo == 'femenino') && ($edad > 17) && ($edad < 36)){
    echo '<i>Bienvenida, usted está en el rango de edad permitido.</i>';
}
else{
    if($sexo != 'femenino'){ echo 'Usted no es del sexo femenino';}
    else{echo 'Usted no entra en el rango de edad';}
}
?>