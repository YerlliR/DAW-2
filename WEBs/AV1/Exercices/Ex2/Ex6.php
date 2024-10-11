<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero1 = readline("Dime el número 1");
$numero2 = readline("Dime el número 2");
$numero3 = readline("Dime el número 3");

if (($numero1 == $numero2 && $numero1 = $numero3)){
    echo "hay tres números iguales a " . $numero1;
} elseif ($numero1 == $numero2){
    echo "hay dos números iguales a " . $numero1;
} elseif ($numero1 == $numero3){
    echo "hay dos números iguales a " . $numero1;
} elseif ($numero2 == $numero3){
    echo "hay dos números iguales a " . $numero2;
}else{
    echo "no hay números iguales";
}