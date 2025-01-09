<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronMatricula($matricula){
    $patron = '/^[0-9]{4} [B-Z]{3}$/';

    if (preg_match($patron, $matricula)) {
        return "valido";
    } else {
        return "no valido";
    }
}

// Ejemplos de pruebas
echo patronMatricula("1234 ABC") . "\n";
echo patronMatricula("5678 XYZ") . "\n";
echo patronMatricula("1234 123") . "\n";
echo patronMatricula("ABCD 123") . "\n";
?>