<?php
/**
 * @author Sergio Ricart Alabau
 */



// Solicitar al usuario que introduzca un número entero de hasta 5 cifras
$numero = readline("Introduce un número entero de hasta 5 cifras: ");

// Verificar si el número tiene al menos 2 cifras
if (strlen($numero) < 2 || strlen($numero) > 5) {
    echo "El número debe tener al menos 2 cifras.";
} else {
    // Obtener la penúltima cifra del número
    $numerosArray = str_split($numero);
    $penultimaCifra = $numerosArray[sizeof($numerosArray) - 2];
    echo "La penúltima cifra del número es: " . $penultimaCifra;
}
