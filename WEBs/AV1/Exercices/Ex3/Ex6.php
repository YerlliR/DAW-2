<?php
/**
 * @author Sergio Ricart Alabau
 */
/**
 * Pide 8 números y los clasifica en pares e impares.
 */

$array = [];
$pares = 0;
$impares = 0;
for ($i = 0; $i < 8; $i++) {
    $numero = readline("Dime un número:");
    if ($numero %2  == 0){
        // si es par
        $array[] = $numero . ": par";
        $pares++;
        
    }else{
        // si es impar
        $array[] = $numero . ": impar";
        $impares++;
    }
}

// Mostrar los resultados
for ($i = 0; $i < count($array); $i++) {
    echo $array[$i] . "\n";
}
echo "Hay $pares (" . $pares / 8 * 100 . "%) pares y $impares (" . $impares / 8 * 100 . "%) impares \n";

