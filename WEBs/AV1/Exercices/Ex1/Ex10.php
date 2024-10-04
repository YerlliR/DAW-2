<?php
/**
 * @author Sergio Ricart Alabau
 */

$numeroAleatorio = rand(1, 5);


$numeros = array("uno","dos","tres","cuatro","cinco");

echo "El numero seleccionado es " . $numeros[$numeroAleatorio - 1];