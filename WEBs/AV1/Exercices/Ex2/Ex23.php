<?php
/**
 * @author Sergio Ricart Alabau
 */

include 'trabajadores.php';

function salarioMaximo($trabajadores) {
    // Obtener el valor maximo de los salarios
    return max($trabajadores);
}

function salarioMinimo($trabajadores) {
    // Obtener el valor minimo de los salarios
    return min($trabajadores);
}

function salarioMedio($trabajadores) {
    // Calcular la suma de los salarios y dividir entre el número de trabajadores
    return array_sum($trabajadores) / count($trabajadores);
}


echo "\nSalario máximo: " . salarioMaximo($trabajadores) . "\n";
echo "Salario mínimo: " . salarioMinimo($trabajadores) . "\n";
echo "Salario medio: " . salarioMedio($trabajadores) . "\n";
