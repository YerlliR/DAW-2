<?php
/**
 * @author Sergio Ricart Alabau
 */



$numero = readline("Introduce un número: ");
//separar los dígitos+
$numerosArray = str_split($numero);

// obtener cantidad de dígitos
echo "El número de dígitos es " . sizeof($numerosArray);

