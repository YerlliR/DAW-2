<?php
/**
 * @author Sergio Ricart Alabau
 */

$fechaYHoraDeseada = readline("Dime la fecha y hora que deseas (en formato: Y-m-d H:i:s): ");

// Calcular la diferencia en segundos entre la fecha y hora deseada y el momento actual
$segundosDiferencia = strtotime($fechaYHoraDeseada) - time();

// Calcular la diferencia en minutos redondeando hacia abajo
$minutosDiferencia = floor($segundosDiferencia / 60);

// Calcular la diferencia en horas redondeando hacia abajo
$horasDiferencia = floor($minutosDiferencia / 60);

// Mostrar el tiempo restante en horas y minutos para alcanzar la fecha y hora deseada
echo "Quedan " . $horasDiferencia . " horas y " . $minutosDiferencia % 60 . " minutos para que sea " . $fechaYHoraDeseada;

