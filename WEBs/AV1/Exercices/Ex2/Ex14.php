<?php
/**
 * @author Sergio Ricart Alabau
 */

function todasLasPotencias($numero, $exponente){

    // Creamos un array vacío para guardar las potencias
    $potenciasVector = [];
    $sumaTotal = 0;

    // Realizamos un bucle para calcular las potencias y sumarlas
    for ($x = 0; $x <= $exponente; $x++) {
        $potencia = pow($numero, $x);
        $potenciasVector[] = $potencia;
        $sumaTotal += $potencia;

        echo "La potencia de $numero a la $x es: $potencia \n";
    }

    echo "La suma de todas las potencias hasta $exponente es: $sumaTotal \n";

}


$numero = readline("Dime el número");
$exponente = readline("Dime hasta que potencia quieres que se calcule la suma");

todasLasPotencias($numero, $exponente);