<?php
/**
 * @author Sergio Ricart Alabau
 */

// Inicializar la matriz y las sumas
$matriz = [];
$sumaLinea = [];
$sumaColumna = [];

// Generar la matriz de números aleatorios
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $matriz[$i][$j] = rand(1, 100); // Asignar un número aleatorio a cada posición
    }
}

// Calcular la suma de las filas y columnas
for ($i = 0; $i < 10; $i++) {
    $sumaLinea[$i] = 0; // Inicializar la suma de la línea actual
    for ($j = 0; $j < 10; $j++) {
        $sumaLinea[$i] += $matriz[$i][$j]; // Sumar el valor actual a la suma de la línea
        $sumaColumna[$j] = isset($sumaColumna[$j]) ? $sumaColumna[$j] + $matriz[$i][$j] : $matriz[$i][$j]; // Sumar el valor actual a la suma de la columna
    }
}

// Imprimir la matriz y las sumas
for ($i = 0; $i < 10; $i++) {
    printf("%-10s", $sumaLinea[$i] . "| "); // Imprimir la suma de la línea
    for ($j = 0; $j < 10; $j++) {
        printf("%-10s", $matriz[$i][$j]); // Imprimir el valor de la matriz
    }
    echo "\n";
}

echo "        ";

for ($i = 0; $i < 10; $i++) {
    printf("%-10s", "-------"); // Imprimir la línea separadora
}
echo "\n";
echo "          ";
for ($i = 0; $i < 10; $i++) {
    printf("%-10s", $sumaColumna[$i] . "  "); // Imprimir la suma de la columna
}
echo "\n";

