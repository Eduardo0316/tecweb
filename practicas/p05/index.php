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

    echo '<br>';
    $a = "PHP5";
    echo $a.'<br>';
    $z[] = &$a;
    print_r ($z); echo '<br>';
    $b = "5a version de PHP";
    echo $b.'<br>';
    $c = $b*10;
    echo $c.'<br>';
    $a .= $b;
    echo $a.'<br>';
    $b *= $c;
    echo $b.'<br>';
    $z[0] = "MySQL";
    print_r ($z); echo '<br>';

    echo '<br>';
    function cambio(){
        global $a;
	    $a = 'HTML5';
        echo '$a: '.$a.'<br>';
        global $b;
	    $b = 'Nueva version HTML5';
        echo '$b: '.$b.'<br>';
        global $c;
        echo '$c : '.$c.'<br>';
        global $z; echo '$z: ';
        print_r ($z); echo '<br>';
    }
    cambio();

    echo '<br>';
    $a = "7 personas";
    $b = (integer) $a;
    $a = "9E3";
    $c = (double) $a;

    var_dump($a); echo '<br>';
    var_dump($b); echo '<br>';
    var_dump($c); echo '<br>';
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    echo '<br>';
    echo '$a: ';var_export($a); echo '<br>';
    echo '$b: ';var_export($b); echo '<br>';
    echo '$c: ';var_export($c); echo '<br>';
    echo '$d: ';var_export($d); echo '<br>';
    echo '$e: ';var_export($e); echo '<br>';
    echo '$f: ';var_export($f); echo '<br>';
?>