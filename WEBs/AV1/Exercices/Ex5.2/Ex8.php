<?php
/**
 * @author Sergio Ricart Alabau
*/
?>
<?php
function patronFijo($telefono){
    $patron = '/^(a|A)(p|P)(r|R)(o|O)(b|B)(a|A)(d|D)(o|O)$/';

    if (preg_match($patron, $telefono)) {
        return "valido";
    }else {
        return "no valida";
    }
}

echo patronFijo("aprobado") . "\n";
echo patronFijo("APROBADO") . "\n";
echo patronFijo("AprOBadO") . "\n";
echo patronFijo("Apr123sdfOBadO") . "\n";