<?php
/**
 * @author Sergio Ricart Alabau
 */

$segundos = readline("Dime segundos para saber la hora");

$minutos = 0;
$horas = 0;

//Si el número de segundos es mayor que 60, calculamos los minutos y segundos
if($segundos > 60){
    $minutos = floor( $segundos / 60);
    $segundos = $segundos % 60;
    //Si el número de minutos es mayor que 60, calculamos las horas y minutos
    if ($minutos > 60){
        $horas = floor( $minutos / 60);
        $minutos = $minutos % 60;
    }
}

echo $horas . ":" . $minutos . ":" . $segundos;
