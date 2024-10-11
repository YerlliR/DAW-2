<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = rand(1,15);
$resultado = 1;

for ($x = $numero; $x > 1; $x-- ){
    $resultado = $resultado *  $x;
}

echo "RESULTADO:" . $resultado ;