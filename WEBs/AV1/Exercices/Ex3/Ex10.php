<?php
/**
 * @author Sergio Ricart Alabau
*/

$matriz1 = [];
$matriz2 = [];
$matrizSuma = [];

// Genera las matrices y la suma de ambas.
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $matriz1[$i][$j] = rand(1, 100);
        $matriz2[$i][$j] = rand(1, 100);
        $matrizSuma[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
    }
}

// Muestra las matrices y la suma de ambas.
echo "Matriz1" . "\n";

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        printf("%-5s", $matriz1[$i][$j]);
    }
    echo "\n";
}

echo "\n";

echo "Matriz2" . "\n";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        printf("%-5s", $matriz2[$i][$j]);
    }
    echo "\n";
}

echo "\n";

echo "Matriz Suma" . "\n";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        printf("%-5s", $matrizSuma[$i][$j]);
    }
    echo "\n";
}
