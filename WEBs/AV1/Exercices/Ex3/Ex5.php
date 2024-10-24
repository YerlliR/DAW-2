<?php
/**
 * @author Sergio Ricart Alabau
 */

//$numeroAleatorioSimple = rand(1000, 9999);

// Generar un número aleatorio de 4 dígitos
$numeroAleatorio = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

// Permitir al usuario intentar adivinar la contraseña hasta 4 veces
for ($i = 0; $i < 4; $i++) {
    // Solicitar al usuario que ingrese la contraseña
    $numero = readline("Contraseña para la caja fuerte: ");
    if ($numero == $numeroAleatorio) {
        // Si la contraseña es correcta
        echo "La contraseña es correcta\n";
        break;
    } else {
        // Si la contraseña es incorrecta
        echo "La contraseña es incorrecta, te quedan " . (3 - $i) . " intentos\n";
    }
}

