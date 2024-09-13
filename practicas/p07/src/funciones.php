
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta por: impar par impar</p>
    <?php
    $arreglo = array(array(), array(), array());
    $i = 0; $conf = FALSE; $n1 = 0; $n2 = 0; $n3 = 0;
    while($conf != TRUE ){
        $n1 = rand(0,1000);
        echo "$n1  ";
        $arreglo[$i][0] = $n1;
        $n2 = rand(0,1000);
        echo "$n2  ";
        $arreglo[$i][1] = $n1;
        $n3 = rand(0,1000);
        echo "$n3  ";
        $arreglo[$i][2] = $n1;
        $i++;
        if(($n1%2 != 0) && ($n2%2 == 0) && ($n3%2 != 0)){
            $conf = TRUE;
        }
        echo'<br>';
    }
    $res = ($i)*3;
    echo "$res números obtenidos en $i iteraciones";
    ?>

    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>
    <?php
    $mult = FALSE; $j = 0; $resm = 0;
        if(isset($_GET['multiplo']))
        {
            $multa = $_GET['multiplo'];
            while($mult == FALSE){
                if(($arreglo[$j][0])%$multa==0){$resm = ($arreglo[$j][0]); $mult = TRUE;}
                elseif(($arreglo[$j][1])%$multa==0){$resm = ($arreglo[$j][1]); $mult = TRUE;}
                elseif(($arreglo[$j][2])%$multa==0){$resm = ($arreglo[$j][2]); $mult = TRUE;}
                else{ $j++; }
            }
            echo 'El primero numero entero y multiplo de '.$multa.' es '.$resm;
        }
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
    a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice.</p>
    <?php
    $array = []; 
    for($k=97;$k<123;$k++){
        $array[$k]=chr($k);
    }
    ?>
    <table border="1">
        <tr>
            <th>Numero decimal</th>
            <th>Caracter ASCII</th>
        </tr>
        <?php
        $concat = '';
        foreach($array as $key => $value){
            $concat.='<tr>';
            $concat .='<td>'.$key.'</td>';
            $concat .='<td>'.$value.'</td>';
            $concat .='</tr>';
        }
        echo $concat;
        ?>
    </table>
