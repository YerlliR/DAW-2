<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^(aprobado|APROBADO)$/';

    if (preg_match($patron, $telefono)) {
        return "valido";
    }else {
        return "no valida";
    }
}

echo patronFijo("aprobado") . "\n";
echo patronFijo("APROBADO") . "\n";
echo patronFijo("JUAN") . "\n";