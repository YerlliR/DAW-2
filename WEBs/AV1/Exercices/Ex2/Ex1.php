<?php
/**
 * @author Sergio Ricart Alabau
 */


//Función para analizar el tipo de carácter introducido.
function analizarCaracter($caracter) {
    if (ctype_upper($caracter)) {
        echo "$caracter es una letra mayúscula.\n";
    } elseif (ctype_lower($caracter)) {
        echo "$caracter es una letra minúscula.\n";
    } elseif (ctype_digit($caracter)) {
        echo "$caracter es un carácter numérico.\n";
    } elseif (ctype_space($caracter)) {
        echo "$caracter es un carácter blanco (espacio, tab, salto de línea, etc).\n";
    } elseif (ctype_punct($caracter)) {
        echo "$caracter es un carácter de puntuación.\n";
    } else {
        echo "$caracter es un carácter especial.\n";
    }
}

$caracter = readline("Introduce un carácter: ");
analizarCaracter($caracter);


