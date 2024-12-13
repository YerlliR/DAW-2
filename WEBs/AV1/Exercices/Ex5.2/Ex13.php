<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^[a-zA-ZÁÉÍÓÚáéíóúñÑ\s0-9]+$/';

    if (preg_match($patron, $telefono)) {
        return "valido";
    }else {
        return "no valida";
    }
}

echo patronFijo("d") . "\n";
echo patronFijo("1") . "\n";
echo patronFijo("áéíóúñ") . "\n";
echo patronFijo("21 87") . "\n";