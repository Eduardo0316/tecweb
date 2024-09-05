<?php
    $_myvar = '$_myvar';
    $_7var = '$_7var';
    //myvar = 'myvar';
    $myvar = '$myvar';
    $var7 = '$var7';
    $_element1 = '$_element1';
    //$house*5 = '$house*5';
    echo $_myvar.'<br>'.$_7var.'<br>'.$myvar.'<br>'.$var7.'<br>'.$_element1.'<br>';

    echo '<br>';
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo $a.'<br>'.$b.'<br>'.$c.'<br>';

    echo '<br>';
    $a = "PHP server";
    $b = &$a;
    echo $a.'<br>'.$b.'<br>';
    echo 'Tras la segunda asignación se cambian los valores de las variables 
    $a y $b, la variable $a solo cambia su valor mientra que la variable $b obtiene el 
    valor de la nueva variable $a <br>';
?>