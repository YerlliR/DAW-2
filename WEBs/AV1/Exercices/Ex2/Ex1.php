<?php
/**
 * @author Sergio Ricart Alabau
 */


function esCaracter($caracter){
if ()
}


$caracter = readline("Escribe un caracter");

//Imprime 50 líneas en blanco, lo hago por estética.
echo str_repeat(PHP_EOL, 50);


if (ctype_upper($caracter)) {
    return "El carácter es una letra mayúscula.";
} elseif (ctype_lower($caracter)) {
    return "El carácter es una letra minúscula.";
} elseif (ctype_digit($caracter)) {
    return "El carácter es un carácter numérico.";
} elseif (ctype_space($caracter)) {
    return "El carácter es un carácter blanco.";
} elseif (esCaracter($caracter)){

}



echo "Tu caracter es:";



