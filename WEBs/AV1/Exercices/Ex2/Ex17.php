<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = readline("Introduce un numero: ");

if ($numero % 2 == 0){
    echo "$numero es par";
} else {
    echo "$numero es impar";
}

if ($numero % 3 == 0){
    echo "\n$numero es divisible por 3";
} else {
    echo "\n$numero no es divisible por 3";
}