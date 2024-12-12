<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^96\d{7}$/';

    if (preg_match($patron, $telefono)) {
        return "Telefono valido";
    }else {
        return "Telefono no valido";
    }
}

echo patronFijo("966123456") . "\n";
echo patronFijo("9661234567") . "\n";
echo patronFijo("976345678") . "\n";
