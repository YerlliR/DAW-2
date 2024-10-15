<?php
/**
 * @author Sergio Ricart Alabau
 */

function potencia($a, $b){
    // Utilizamos la función pow para elevar $a a la potencia $b y lo mostramos por pantalla
    echo pow($a, $b);

}
$a = readline("Dime el primer número ");
$b = readline("Dime a cuánto quieres elevar el número anterior ");

potencia($a, $b);