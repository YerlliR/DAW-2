<?php
/**
 * @author Sergio Ricart Alabau
 */

$array = [];
$pares = 0;
$impares = 0;
for ($i = 0; $i < 8; $i++) {
    $numero = readline("Dime un número:");
    if ($numero %2  == 0){
        $array[] = $numero . ": par";
        $pares++;
        
    }else{
        $array[] = $numero . ": impar";
        $impares++;
    }
}

for ($i = 0; $i < count($array); $i++) {
    echo $array[$i] . "\n";
}
echo "Hay $pares (" . $pares / 8 * 100 . "%)pares y $impares (" . $impares / 8 * 100 . "%) impares \n";
