<?php
/**
 * @author Sergio Ricart Alabau
 */

function permutaciones ($V) {
    // Contador del tamaño del array
    $N = count($V);

    for ($i = 0; $i < $N/2; $i++) {
        // Intercambiamos los elementos en la posición $i y $N-1-$i
        list($V[$i], $V[$N - 1 - $i]) = array($V[$N - 1 - $i], $V[$i]);
    }
    
    return $V;
}

$V = array(1, 2, 3, 4, 5);

print_r(permutaciones($V));

