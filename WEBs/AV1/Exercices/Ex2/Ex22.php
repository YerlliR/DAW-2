<?php
/**
 * @author Sergio Ricart Alabau
 */

// definir la lista de números
$lista = [1,2,3,4,5,6,-1,-2,-3,-4];

// inicializar variables para contar la cantidad de positivos y negativos
$cantidadPositivos = 0;
$cantidadNegativos = 0;

// recorrer la lista y verificar cada número
foreach ($lista as $numeros) {
    // si el número es negativo, incrementar la cantidad de negativos
    if ($numeros <= 0) {
        echo $numeros . " es negativo";
        echo "\n";

        $cantidadNegativos++;
    // si el número es positivo, incrementar la cantidad de positivos
    } else {
        echo $numeros . " es positivo";
        echo "\n";

        $cantidadPositivos++;
    }
}

// mostrar la cantidad de positivos y negativos
echo "La cantidad de positivos es: " . $cantidadPositivos;
echo "\n";
echo "La cantidad de negativos es: " . $cantidadNegativos;
echo "\n";

// calcular y mostrar el porcentaje de positivos y negativos
$porcentajePositivos = ($cantidadPositivos / count($lista)) * 100;
echo "El porcentaje de positivos es: " . $porcentajePositivos;
echo "\n";

$porcentajeNegativos = ($cantidadNegativos / count($lista)) * 100;
echo "El porcentaje de negativos es: " . $porcentajeNegativos;
echo "\n";

