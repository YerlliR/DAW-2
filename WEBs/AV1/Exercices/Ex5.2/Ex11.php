<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^\d+(\s\d+)*$/';

    if (preg_match($patron, $telefono)) {
        return "valido";
    }else {
        return "no valida";
    }
}

echo patronFijo("d") . "\n";
echo patronFijo("1") . "\n";
echo patronFijo("489489 7444") . "\n";
echo patronFijo("21 87") . "\n";