<?php

// Función para realizar operaciones con matrices
function operaMatriz($matriz1, $matriz2, $operacion) {
    $matrizSolucion = []; // Inicializa la matriz solución
    echo "Matriz 1:\n";
    imprimirMatriz($matriz1); // Imprime la primera matriz
    echo "Matriz 2:\n";
    imprimirMatriz($matriz2); // Imprime la segunda matriz
    echo "Operación: ";
    
    switch ($operacion) {
        case 's':
            echo "Suma\n"; // Indica operación de suma
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz1[0]); $j++) {
                    $matrizSolucion[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j]; // Suma elementos correspondientes
                }
            }
            break;
        case 'r':
            echo "Resta\n"; // Indica operación de resta
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz1[0]); $j++) {
                    $matrizSolucion[$i][$j] = $matriz1[$i][$j] - $matriz2[$i][$j]; // Resta elementos correspondientes
                }
            }
            break;
        case 'm':
            echo "Multiplicación\n"; // Indica operación de multiplicación
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz1[0]); $j++) {
                    $matrizSolucion[$i][$j] = $matriz1[$i][$j] * $matriz2[$i][$j]; // Multiplica elementos correspondientes
                }
            }
            break;
        case 'd':
            echo "División\n"; // Indica operación de división
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz1[0]); $j++) {
                    $matrizSolucion[$i][$j] = $matriz2[$i][$j] !== 0 ? $matriz1[$i][$j] / $matriz2[$i][$j] : 'Inf'; // Divide con comprobación de división por cero
                }
            }
            break;
    }
    echo "Matriz Resultado:\n";
    imprimirMatriz($matrizSolucion); // Imprime la matriz resultante
}

// Función para imprimir una matriz
function imprimirMatriz($matriz) {
    for ($i = 0; $i < count($matriz); $i++) {
        for ($j = 0; $j < count($matriz[0]); $j++) {
            printf("%-10s", $matriz[$i][$j] . "|"); // Imprime cada elemento con formato
        }
        echo "\n";
    }
    echo "\n";
}

// Genera dos matrices con valores aleatorios
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $matriz1[$i][$j] = rand(1, 100);
        $matriz2[$i][$j] = rand(1, 100);
    }
}

// Realiza operaciones con las matrices
operaMatriz($matriz1, $matriz2, 's'); // Suma
operaMatriz($matriz1, $matriz2, 'r'); // Resta
operaMatriz($matriz1, $matriz2, 'm'); // Multiplicación
operaMatriz($matriz1, $matriz2, 'd'); // División

