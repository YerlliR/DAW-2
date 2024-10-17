<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = rand(1,15);

$resultado = 1;

//Bucle for para multiplicar el número por todos los números anteriores
for ($x = $numero; $x > 1; $x-- ){
    //Multiplicamos el resultado por el número actual
    $resultado = $resultado *  $x;
}

echo "RESULTADO:" . $resultado ;
