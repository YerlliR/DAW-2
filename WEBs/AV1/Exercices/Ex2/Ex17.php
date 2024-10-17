<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = readline("Introduce un numero: ");

//Comprobamos si el numero es par
if ($numero % 2 == 0){
    echo "$numero es par";
} else {
    echo "$numero es impar";
}

//Comprobamos si el numero es divisible por 3
if ($numero % 3 == 0){
    echo "\n$numero es divisible por 3";
} else {
    echo "\n$numero no es divisible por 3";
}
