<?php
/**
 * @author Sergio Ricart Alabau
 */


$euros = readline("Cuantos euros tienes?\n");
$tasaConversion = 166.386;

$resultado = $euros * $tasaConversion;
echo $euros . "€ son " . $resultado . " pesetas";