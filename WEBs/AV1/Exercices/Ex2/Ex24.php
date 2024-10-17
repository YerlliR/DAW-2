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

// Función para calcular el salario aumentado por un porcentaje
function calcularSalarioAumentado($trabajadores, $porcentaje) {
    $salariosAumentados = [];
    foreach ($trabajadores as $nombre => $salario) {
        $aumento = $salario * ($porcentaje / 100); // Calcular el aumento
        $nuevoSalario = $salario + $aumento; // Nuevo salario con aumento
        $salariosAumentados[$nombre] = $nuevoSalario;
    }
    return $salariosAumentados;
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

// Verificar si se ingresaron datos
if (empty($trabajadores)) {
    echo "No se ingresaron trabajadores o salarios.\n";
} else {
    // Solicitar el porcentaje de aumento
    $porcentajeAumento = (float) readline("Ingrese el porcentaje de aumento para los salarios: ");
    
    // Calcular los salarios aumentados
    $salariosAumentados = calcularSalarioAumentado($trabajadores, $porcentajeAumento);

    // Mostrar los salarios originales y los aumentados
    echo "Salarios actuales y aumentados:\n";
    foreach ($trabajadores as $nombre => $salario) {
        $nuevoSalario = $salariosAumentados[$nombre];
        echo "$nombre: Salario actual = $salario, Salario con aumento ($porcentajeAumento%) = $nuevoSalario\n";
    }

    // Calcular y mostrar los resultados
    echo "El salario máximo es: " . salarioMaximo($trabajadores) . PHP_EOL;
    echo "El salario mínimo es: " . salarioMinimo($trabajadores) . PHP_EOL;
    echo "El salario medio es: " . salarioMedio($trabajadores) . PHP_EOL;
}

?>
