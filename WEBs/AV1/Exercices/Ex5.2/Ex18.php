<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronIPv4($ip){
    $patron = '/^([0-9]{1,3}\.){3}[0-9]{1,3}$/';

    if (preg_match($patron, $ip)) {
        return "valido";
    } else {
        return "no valido";
    }
}

// Ejemplos de pruebas
echo patronIPv4("192.168.1.1") . "\n";
echo patronIPv4("255.255.255.255") . "\n";
echo patronIPv4("999.999.999.999") . "\n";
echo patronIPv4("256.256.256.256") . "\n";
?>