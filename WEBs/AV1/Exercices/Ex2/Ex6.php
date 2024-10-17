<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero1 = readline("Dime el número 1: ");
$numero2 = readline("Dime el número 2: ");
$numero3 = readline("Dime el número 3: ");

//Comprobamos si hay tres números iguales
if ($numero1 == $numero2 && $numero1 == $numero3) {
    echo "Hay tres números iguales a " . $numero1;
//Comprobamos si hay dos números iguales
} elseif ($numero1 == $numero2) {
    echo "Hay dos números iguales a " . $numero1;
} elseif ($numero1 == $numero3) {
    echo "Hay dos números iguales a " . $numero1;
} elseif ($numero2 == $numero3) {
    echo "Hay dos números iguales a " . $numero2;
//Si no hay números iguales, mostramos un mensaje
} else {
    echo "No hay números iguales";
}
