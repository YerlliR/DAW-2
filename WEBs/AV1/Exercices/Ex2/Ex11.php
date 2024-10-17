<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = readline("Dime el número");

//Si el número es par, le restamos 1 para que sea impar
if ($numero % 2 == 0){
    $numero = $numero -1;
}

//Bucle while para mostrar todos los números impares desde el número introducido hasta 0
while ($numero >= 0){
    echo $numero . "\n";
    $numero = $numero -2;
}
