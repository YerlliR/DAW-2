<?php
/**
 * @author Sergio Ricart Alabau
 */
$numero = 0;
$total = 0;
$x = 0;
$verificacion = true;

while($verificacion){
    $numero = readline("Número para la media (para dejar de introducir números introduzca cualquier carácter):");
    if (!is_numeric($numero)){
        $verificacion = false;

    }else{
        $total += $numero;
        $x++;
    }
}

//Imprime 50 líneas en blanco, lo hago por estética.
echo str_repeat(PHP_EOL, 50);

echo "La media es: " . $total/$x;