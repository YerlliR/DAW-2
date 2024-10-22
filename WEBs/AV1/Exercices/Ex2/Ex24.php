<?php
/**
 * @author Sergio Ricart Alabau
 */

include 'trabajadores.php';

// Calcular el salario anual de cada trabajador
foreach ($trabajadores as $nombre => $salario) {
    $trabajadores[$nombre] = $salario * 12; // Convertir salario mensual a anual
}

// Solicitar el porcentaje de aumento
$aumento = readline("Introduce el porcentaje de aumento: ");

// Mostrar los salarios anuales antes del aumento
echo "Salario anual antes del aumento:\n";
foreach ($trabajadores as $nombre => $salarioAnual) {
    echo "Salario anual de $nombre: $salarioAnual \n";
}

// Aplicar el aumento
foreach ($trabajadores as $nombre => $salarioAnual) {
    $trabajadores[$nombre] = ($salarioAnual * $aumento / 100) + $salarioAnual; // Calcular aumento
}

// Mostrar los salarios anuales después del aumento
echo "\nSalario anual después del aumento:\n";
foreach ($trabajadores as $nombre => $salarioAnual) {
    echo "Salario anual aumentado de $nombre: $salarioAnual \n";
}
