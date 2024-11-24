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
        <form method="get" action="">
            <label for="combinacion">Combinación:</label>
            <input type="number" id="combinacion" name="combinacion" required min="1000" max="9999"><br><br>

            <input type="submit" name="enviar" value="Abrir"><br><br>
        </form>

        <?php
            $combinacionCorrecta = 1234;
            $intentos = 0;

            if (isset($_GET['enviar'])) {
               $combinacion = $_GET['combinacion'];
               $intentos++;

               if ($combinacion == $combinacionCorrecta) {
                   echo "<p style='color:green'>La caja fuerte se ha abierto satisfactoriamente</p>";
               } else {
                   if ($intentos < 4) {
                       echo "<p style='color:red'>Lo siento, esa no es la combinacion</p>";
                   } else {
                       echo "<p style='color:red'>Has agotado tus intentos, no puedes abrir la caja fuerte</p>";
                   }
               }
            }
        ?>
    </body>
</html>
