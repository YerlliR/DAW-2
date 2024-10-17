<?php
/**
 * @author Sergio Ricart Alabau
 */

$hora = date('H:i:s');

$dia = date('N');

//Definimos un array con los días de la semana
$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");

//Mostramos el día de la semana y la hora actual
echo $dias[$dia - 1] . " " . $hora;

