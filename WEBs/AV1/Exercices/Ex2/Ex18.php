<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = readline("Introduce un número: ");

// Separamos el numero en un array de digitos
$numerosArray = str_split($numero);

// Calculamos la mitad del array
$mitad = floor(count($numerosArray) / 2);

// Comprobamos si el numero de digitos es par o impar
if (count($numerosArray) % 2 == 0){
    // Si es par, mostramos los dos digitos de en medio
    echo $numerosArray[$mitad]. " y " . $numerosArray[$mitad -1 ];
} else {
    // Si es impar, mostramos solo el digito de en medio
    echo $numerosArray[$mitad] ;
}

