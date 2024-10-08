<?php
/**
 * @author Sergio Ricart Alabau
 */

$segundos = readline("Dime segundos para saber la hora");

$minutos = 0;
$horas = 0;
if($segundos > 60){
    $minutos = floor( $segundos / 60);
    $segundos = $segundos % 60;
    if ($minutos > 60){
        $horas = floor( $minutos / 60);
        $minutos = $minutos % 60;
    }
}

echo $horas . ":" . $minutos . ":" . $segundos;