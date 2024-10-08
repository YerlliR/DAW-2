<?php
/**
 * @author Sergio Ricart Alabau
 */


$hora = date('H:i:s');
$dia = date('N');

$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");


echo $dias[$dia - 1] . " " . $hora;
