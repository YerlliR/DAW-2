<?php
/**
 * @author Sergio Ricart Alabau
 */
$verificacion = true;
$numero1 = 0;
$numero2 = 0;
$numero3 = 0;

while ($verificacion){
    $numero1 = readline("Dime un número");
    $numero2 = readline("Dime otro número");
    $numero3 = readline("Dime otro número");
    if (($numero1 == $numero2) || ($numero1 == $numero3) || ($numero2 == $numero3)){
        $verificacion = true;
        echo "Uno de los números es igual a otro";
    }else {
        $verificacion = false;
    }
}



$array = array($numero1,$numero2,$numero3);

//Imprime 50 líneas en blanco, lo hago por estética.
echo str_repeat(PHP_EOL, 50);

sort($array);

echo "RESULTADO:\n";
for ($i = 0; $i < count($array); $i++){
    echo $array[$i] . ", ";
}