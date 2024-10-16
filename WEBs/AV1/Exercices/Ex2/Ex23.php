<?php

// Función para solicitar al usuario los nombres y salarios
function solicitarDatosTrabajadores() {
    $trabajadores = [];
    $numTrabajadores = (int) readline("Ingrese el número de trabajadores: ");

    if ($numTrabajadores <= 0) {
        echo "No se ingresaron trabajadores.\n";
        return $trabajadores;
    }

    for ($i = 0; $i < $numTrabajadores; $i++) {
        $nombre = readline("Ingrese el nombre del trabajador " . ($i + 1) . ": ");
        $salario = (float) readline("Ingrese el salario de $nombre: ");
        $trabajadores[$nombre] = $salario; // Guardar el nombre y el salario en el array asociativo
    }

    return $trabajadores;
}

// Función para obtener el salario máximo
function salarioMaximo($trabajadores) {
    if (empty($trabajadores)) {
        return null; // Retorna null si no hay trabajadores
    }
    return max($trabajadores);
}

// Función para obtener el salario mínimo
function salarioMinimo($trabajadores) {
    if (empty($trabajadores)) {
        return null; // Retorna null si no hay trabajadores
    }
    return min($trabajadores);
}

// Función para calcular el salario medio
function salarioMedio($trabajadores) {
    if (empty($trabajadores)) {
        return null; // Retorna null si no hay trabajadores
    }
    $totalSalarios = array_sum($trabajadores); // Suma de todos los salarios
    $numTrabajadores = count($trabajadores);   // Número de trabajadores
    return $totalSalarios / $numTrabajadores;  // Calcular el promedio
}

// Solicitar datos al usuario
$trabajadores = solicitarDatosTrabajadores();

// Comprobar si hay trabajadores
if (empty($trabajadores)) {
    echo "No se ingresaron trabajadores o salarios.\n";
} else {
    // Calcular y mostrar los resultados
    echo "El salario máximo es: " . salarioMaximo($trabajadores) . PHP_EOL;
    echo "El salario mínimo es: " . salarioMinimo($trabajadores) . PHP_EOL;
    echo "El salario medio es: " . salarioMedio($trabajadores) . PHP_EOL;
}

?>
