<?php
/**
 * @author Sergio Ricart Alabau
 */

$horas = readline("Dime las horas: ");
$minutos = readline("Dime los minutos: ");
$segundos = readline("Dime los segundos: ");
$dias = 0;

if($segundos >= 60){
    $minutos = $minutos + floor( $segundos / 60);
    $segundos = $segundos % 60;
}

if ($minutos >= 60){
    $horas = $horas + floor( $minutos / 60);
    $minutos = $minutos % 60;
}

if ($horas >= 24){
    $dias = floor($horas / 24);
    $horas = $horas % 24;
}

echo $dias . " dias " . $horas . ":" . $minutos . ":" . $segundos;