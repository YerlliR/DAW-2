<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronMACGuiones($mac){
    $patron = '/^([0-9A-Fa-f]{2}-){5}[0-9A-Fa-f]{2}$/';

    if (preg_match($patron, $mac)) {
        return "valido";
    } else {
        return "no valido";
    }
}

// Ejemplos de pruebas
echo patronMACGuiones("00-14-22-01-23-45") . "\n";
echo patronMACGuiones("FF-FF-FF-FF-FF-FF") . "\n";
echo patronMACGuiones("G0-14-22-01-23-45") . "\n";
echo patronMACGuiones("00:14:22:01:23:45") . "\n";
?>