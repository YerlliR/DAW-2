<?php
/**
 * @author Sergio Ricart Alabau
 */


$pesetas = readline("Cuantos pesetas tienes?\n");
$tasaConversion = 166.386;

$resultado = $pesetas / $tasaConversion;
echo $pesetas . "€ son " . $resultado . " pesetas";