<?php
/**
 * @author Sergio Ricart Alabau
 */

$numeros = 0;
$notas = 0;
while ($nota = "S"){
    $nota = readline("Dime la nota de el aumno (S to stop)");
    if ($nota = "S"){
        echo "bye bye";
    }else{
        $numeros = $numeros + $nota;
        $notas++;
    }
}
echo "La media es: " . $numeros / $notas . "\n" . "Han superado la media: " . $