<?php
/**
 * @author Sergio Ricart Alabau
 */

 $numero = readline("Introduce un número: ");

 // separar los dígitos
 $numerosArray = str_split($numero);
 // vultar los dígitos
 $numerosArray = array_reverse($numerosArray);
 // mostrar los dígitos
 print_r($numerosArray);
