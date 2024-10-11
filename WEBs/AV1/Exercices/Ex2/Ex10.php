<?php
/**
 * @author Sergio Ricart Alabau
 */

$numero = rand(1,20);
$resultado = 0;

for ($x = $numero; $x > 1; $x-- ){
    $resultado = $resultado +  $x;
}

echo "RESULTADO:" . $resultado;