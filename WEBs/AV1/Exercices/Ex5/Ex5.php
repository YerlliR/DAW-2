<?php
/**
 * @author Sergio Ricart Alabau
 */
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="get">
            <label for="character">Introduce un carácter</label><br>
            <input type="text" name="character" id="character"><br><br>
            <input type="submit" name="enviar" id="enviar"><br>
        </form>
        <?php
            if (isset($_GET['enviar'])) {
                $caracter = $_GET['character'];


            function analizarCaracter($caracter) {
                if (ctype_upper($caracter)) {
                    echo "$caracter es una letra mayúscula.\n";
                } elseif (ctype_lower($caracter)) {
                    echo "$caracter es una letra minúscula.\n";
                } elseif (ctype_digit($caracter)) {
                    echo "$caracter es un carácter numérico.\n";
                } elseif (ctype_space($caracter)) {
                    echo "$caracter es un carácter blanco (espacio, tab, salto de línea, etc).\n";
                } elseif (ctype_punct($caracter)) {
                    echo "$caracter es un carácter de puntuación.\n";
                } else {
                    echo "$caracter es un carácter especial.\n";
                }
            }
            analizarCaracter($caracter);
            }
        ?>
    </body>
</html>