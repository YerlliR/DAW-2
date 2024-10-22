<?php
/**
 * @author Sergio Ricart Alabau
 */


$nota = readline("Dime la nota: ");

if ($nota > 10 || $nota < 0) {
    echo "La nota introducida no es correcta" . "\n";
} elseif ($nota < 5) {
    echo "Insuficiente" . "\n";
} elseif ($nota == 5) {
    echo "Suficiente" . "\n";
} elseif ($nota == 6) {
    echo "Bien" . "\n";
} elseif ($nota == 7) {
    echo "Notable" . "\n";
} elseif ($nota == 8) {
    echo "Sobresaliente" . "\n";
} else {
    echo "Excelente" . "\n";
}


