<?php
/**
 * @author Sergio Ricart Alabau
 */

//$numeroAleatorioSimple = rand(1000, 9999);

$numeroAleatorio = str_pad(rand(0,9999), 4, '0', STR_PAD_LEFT);

for ($i = 0; $i < 4; $i++) {
    $numero = readline("Contraseña para la caja fuerte ?");
    if ($numero == $numeroAleatorio) {
        echo "La contraseña es correcta" . "\n";
        break;
    } else {
        echo "La contraseña es incorrecta, te quedan " . (3 - $i) . " intentos" . "\n";
    }
}