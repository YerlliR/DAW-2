<?php
/**
 * @author Sergio Ricart Alabau
 */

$numeroDecimal = readline("Número decimal:\n");

//Imprime 50 líneas en blanco, lo hago por estética.
echo str_repeat(PHP_EOL, 50);

echo "El número redondeado es " . round($numeroDecimal);