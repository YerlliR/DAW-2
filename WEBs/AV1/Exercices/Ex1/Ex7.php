<?php
/**
 * @author Sergio Ricart Alabau
 */


$numero1 = readline("Dime un número");
$numero2 = readline("Dime otro número");
$numero3 = readline("Dime otro número");
$array = array($numero1,$numero2,$numero3);

//Imprime 50 líneas en blanco, lo hago por estética.
echo str_repeat(PHP_EOL, 50);

sort($array);

echo "RESULTADO:\n";
for ($i = 0; $i < count($array); $i++){
    echo $array[$i] . ", ";
}