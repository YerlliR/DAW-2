<?php
/**
 * @author Sergio Ricart Alabau
 */


$sumatorio = 0;

for ($i = 1; $i < 8; $i++) {
    $numero = readline("Dime la nota del alumno $i:");

    $sumatorio += $numero;
}

$nota = floor($sumatorio / 7);



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
echo "La nota media del curso es: " . $sumatorio / 7 . "\n";