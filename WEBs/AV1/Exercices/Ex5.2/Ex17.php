<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronContrasena($password){
    $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$/';

    if (preg_match($patron, $password)) {
        return "valido";
    } else {
        return "no valido";
    }
}

// Ejemplos de pruebas
echo patronContrasena("Abc123") . "\n";
echo patronContrasena("Xyz987") . "\n";
echo patronContrasena("abc123") . "\n";
echo patronContrasena("ABC123") . "\n";
?>