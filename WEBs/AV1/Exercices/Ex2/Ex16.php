<?php
/**
 * @author Sergio Ricart Alabau
 */

// funcion que resuelve una ecuacion de primer grado
function ecuacionDePrimerGrado($a, $b) {
    $x = $b / $a;
    echo "La solucion es x = " . $x;
}

// llamamos a la funcion con los valores introducidos por el usuario
ecuacionDePrimerGrado(readline("Introduce el valor de a:"), readline("Introduce el valor de b:"));
