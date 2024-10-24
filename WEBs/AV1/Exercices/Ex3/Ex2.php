<?php
/**
 * @author Sergio Ricart Alabau
 */

// Pide la nota al usuario y la evalúa
$nota = readline("Dime la nota: ");

// Evalúa la nota
if ($nota > 10 || $nota < 0) {
    // La nota no es correcta
    echo "La nota introducida no es correcta" . "\n";
} elseif ($nota < 5) {
    // Insuficiente
    echo "Insuficiente" . "\n";
} elseif ($nota == 5) {
    // Suficiente
    echo "Suficiente" . "\n";
} elseif ($nota == 6) {
    // Bien
    echo "Bien" . "\n";
} elseif ($nota == 7) {
    // Notable
    echo "Notable" . "\n";
} elseif ($nota == 8) {
    // Sobresaliente
    echo "Sobresaliente" . "\n";
} else {
    // Excelente
    echo "Excelente" . "\n";
}

