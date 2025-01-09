<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^(0[1-9]|[12][0-9]|3[01])[-\/](0[1-9]|1[0-2])[-\/](\d{4})$/';

    if (preg_match($patron, $telefono)) {
        return "Fecha valida";
    }else {
        return "Fecha no valida";
    }
}

echo patronFijo("01/01/1990") . "\n";
echo patronFijo("32/02/1992") . "\n";
echo patronFijo("31/13/1999") . "\n";