<?php
/**
 * @author Sergio Ricart Alabau
 */

$dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

$numero = readline("Introduzca un número del 1 al 7: ");

//Comprobar si el número es válido
if ($numero > 7 || $numero < 0) {
    echo "El número introducido no es válido.";
}else{
    //Si el número es válido mostrar el dia de la semana
    echo $dias[$numero - 1] . "\n";
}
