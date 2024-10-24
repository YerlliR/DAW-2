<?php
/**
 * @author Sergio Ricart Alabau
 * 
*/

// Inicializamos la matriz
$matriz = [];

// Recorremos la matriz y asignamos valores
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz[$i][$j] = $i + $j;
    }
}

// Mostramos la matriz
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        printf("%-5s", $matriz[$i][$j]);
    }
    echo "\n";
}
