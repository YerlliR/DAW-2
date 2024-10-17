<?php
/**
 * @author Sergio Ricart Alabau
 */

$tabla = readline("Número para crear la tabla: ");

//Creamos la tabla de multiplicar con un bucle for
for ($x = 0; $x <= 10; $x++){
    echo $tabla . " * " . $x . " = " . $tabla * $x . "\n";
}
