<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = readline("Dime el número");

if ($numero % 2 == 0){
    $numero = $numero -1;
}

while ($numero >= 0){
    echo $numero . "\n";
    $numero = $numero -2;
}