<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronURL($url){
    $patron = '/^http:\/\/[a-zA-Z0-9.-]+\/[a-zA-Z0-9?=&-_]+$/';

    if (preg_match($patron, $url)) {
        return "valido";
    } else {
        return "no valido";
    }
}

// Ejemplos de pruebas
echo patronURL("http://www.ieslasenia.org/ejercicio?16") . "\n";  
echo patronURL("http://www.ejemplo.com/") . "\n";  
echo patronURL("www.ieslasenia.org") . "\n";  
echo patronURL("http://.com") . "\n";  
?>