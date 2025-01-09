<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronTextoPuntuacion($cadena){
    $patron = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \'.,;:-]+$/';

    if (preg_match($patron, $cadena)) {
        return "valido";
    } else {
        return "no valido";
    }
}

// Ejemplos de pruebas
echo patronTextoPuntuacion("Texto, con puntuación.") . "\n";  
echo patronTextoPuntuacion("Texto; con comas y guiones -") . "\n";  
echo patronTextoPuntuacion("Texto / con barra") . "\n";  
echo patronTextoPuntuacion("Texto*") . "\n";  
?>