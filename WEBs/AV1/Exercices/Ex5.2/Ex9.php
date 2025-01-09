<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^([a-zA-Z\s])$/';

    if (preg_match($patron, $telefono)) {
        return "valido";
    }else {
        return "no valida";
    }
}

echo patronFijo("d") . "\n";
echo patronFijo("1") . "\n";
echo patronFijo(" ") . "\n";
echo patronFijo("") . "\n";