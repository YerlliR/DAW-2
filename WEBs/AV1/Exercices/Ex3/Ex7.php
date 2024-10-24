<?php
/**
 * @author Sergio Ricart Alabau
 */

// Inicializamos los arreglos para números, sus cuadrados y cubos
$numeros = [];
$cuadrados = [];
$cubos = [];

// Llenamos el arreglo de números con valores aleatorios entre 1 y 100
for ($i = 0; $i < 20; $i++) {
    $numeros[] = rand(1, 100);
}

// Calculamos el cuadrado de cada número y lo almacenamos en el arreglo de cuadrados
for ($i = 0; $i < count($numeros); $i++) {
    $cuadrados[] = $numeros[$i] * $numeros[$i];
}

// Calculamos el cubo de cada número y lo almacenamos en el arreglo de cubos
for ($i = 0; $i < count($numeros); $i++) {
    $cubos[] = $numeros[$i] * $numeros[$i] * $numeros[$i];
}

// Mostramos cada número junto con su cuadrado y cubo
for ($i = 0; $i < count($numeros); $i++) {
    printf("%-10s %-10s %-10s\n", $numeros[$i], $cuadrados[$i], $cubos[$i]);
}

