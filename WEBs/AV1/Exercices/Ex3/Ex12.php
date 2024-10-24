<?php
/**
 * @author Sergio Ricart Alabau
 *
 */

// Inicializamos la suma de los números
$suma = 0;

// Creamos un array para guardar los números introducidos
$array = [];

// Bucle para leer los números
while ($suma <= 1000) {
    // Leemos un número
    $numero = readline("Introduce un número: ");
    // Lo guardamos en el array
    $array[] = $numero;
    // Sumamos el número a la suma
    $suma = $suma + $numero;
}

// Mostramos la suma de los números
echo "La suma de los números es: " . $suma . "\n";

// Mostramos los números introducidos
echo "Los números introducidos son: " . implode(", ", $array) . "\n";

// Mostramos la cantidad de números introducidos
echo "Son " . count($array) . " números introducidos" . "\n";

// Mostramos la media de los números introducidos
echo "La media de los números introducidos es: " . $suma / count($array) . "\n";
