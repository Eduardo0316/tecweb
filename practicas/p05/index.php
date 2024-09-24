<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Ejercicio 5</title>
</head>

<body>
<?php
    $_myvar = '$_myvar';
    $_7var = '$_7var';
    //myvar = 'myvar';
    $myvar = '$myvar';
    $var7 = '$var7';
    $_element1 = '$_element1';
    //$house*5 = '$house*5';
    echo $_myvar.'<br>'.$_7var.'<br>'.$myvar.'<br>'.$var7.'<br>'.$_element1.'<br>';
?>

<?php
    echo '<br>';
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo $a.'<br>'.$b.'<br>'.$c.'<br>';
?>

<?php
    echo '<br>';
    $a = "PHP server";
    $b = &$a;
    echo $a.'<br>'.$b.'<br>';
    echo 'Tras la segunda asignación se cambian los valores de las variables 
    $a y $b, la variable $a solo cambia su valor mientra que la variable $b obtiene el 
    valor de la nueva variable $a <br>';

?>
<?php
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

?>

<?php
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

    ?>
    
    <?php
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

    ?>
    
    <?php
    echo '<br>';
    echo '$a: ';var_export($a); echo '<br>';
    echo '$b: ';var_export($b); echo '<br>';
    echo '$c: ';var_export($c); echo '<br>';
    echo '$d: ';var_export($d); echo '<br>';
    echo '$e: ';var_export($e); echo '<br>';
    echo '$f: ';var_export($f); echo '<br>';

?>

<?php
    echo '<br>';
    echo "Versión de Apache y PHP: " . $_SERVER['SERVER_SOFTWARE'] .'<br>';
    echo "Nombre del sistema operativo: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
    echo "Idioma: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";
?>

<p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>

</body>
</html>