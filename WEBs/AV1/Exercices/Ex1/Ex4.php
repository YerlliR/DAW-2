<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero1 = readline("Número 1:\n");
$numero2 = readline("Número 2:\n");

//Imprime 50 líneas en blanco, lo hago por estética.
echo str_repeat(PHP_EOL, 50);

echo "Suma: $numero1 + $numero2 = " . ($numero1 + $numero2) . "\n";
echo "Resta: $numero1 - $numero2 = " . ($numero1 - $numero2) . "\n";
echo "Multiplicación: $numero1 * $numero2 = " . ($numero1 * $numero2) . "\n";
echo "División: $numero1 / $numero2 = " . ($numero1 / $numero2) . "\n";
