<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^6|7\d{8}$/';

    if (preg_match($patron, $telefono)) {
        return "Codigo postal valido";
    }else {
        return "Codigo postal no valido";
    }
}

echo patronFijo("46200") . "\n";
echo patronFijo("122000") . "\n";
echo patronFijo("01122") . "\n";