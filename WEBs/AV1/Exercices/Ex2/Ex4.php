<?php
/**
 * @author Sergio Ricart Alabau
 */

$horas = readline("Dime las horas: ");
$minutos = readline("Dime los minutos: ");
$segundos = readline("Dime los segundos: ");

$dias = 0;

//Si el número de segundos es mayor o igual que 60, calculamos los minutos y segundos
if($segundos >= 60){
    $minutos = $minutos + floor( $segundos / 60);
    $segundos = $segundos % 60;
}

//Si el número de minutos es mayor o igual que 60, calculamos las horas y minutos
if ($minutos >= 60){
    $horas = $horas + floor( $minutos / 60);
    $minutos = $minutos % 60;
}

//Si el número de horas es mayor o igual que 24, calculamos los días y horas
if ($horas >= 24){
    $dias = floor($horas / 24);
    $horas = $horas % 24;
}

echo $dias . " dias " . $horas . ":" . $minutos . ":" . $segundos;
