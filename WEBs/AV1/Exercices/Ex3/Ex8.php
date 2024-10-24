<?php
/**
 * @author Sergio Ricart Alabau
 * 
*/

// Inicializamos los vectores
$vectorA = [];
$vectorB = [];
$vectorC = [];

// Rellenamos los vectores A y B
for ($i = 0; $i < 10; $i++) {
    $vectorA[] = rand(1, 100);
    $vectorB[] = rand(1, 100);
}

// Rellenamos el vector C con los valores de A y B, alterando su orden
for ($i = 0; $i < 20; $i++) {
    $vectorC[] = $vectorA[$i];
    $vectorC[] = $vectorB[$i];
}

// Mostramos los vectores
echo "Vector A: " . implode(", ", $vectorA) . "\n";
echo "Vector B: " . implode(", ", $vectorB) . "\n";
echo "Vector C: " . implode(", ", $vectorC) . "\n";
