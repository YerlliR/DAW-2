<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = rand(1,20);

$resultado = 0;

// Bucle for para sumar todos los números anteriores al número aleatorio
for ($x = $numero; $x > 1; $x-- ){
    // Sumamos el número actual al resultado
    $resultado = $resultado +  $x;
}

echo "RESULTADO:" . $resultado;
