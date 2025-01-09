<?php
/**
 * @author Sergio Ricart Alabau
*/
?>

<?php
function patronEmail($email){
    $patron = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';

    if (preg_match($patron, $email)) {
        return "valido";
    } else {
        return "no valido";
    }
}

// Ejemplos de pruebas
echo patronEmail("usuario@dominio.com") . "\n";  
echo patronEmail("usuario@dominio.co") . "\n";  
echo patronEmail("usuario@dominio") . "\n";  
echo patronEmail("usuario@.com") . "\n";  
?>