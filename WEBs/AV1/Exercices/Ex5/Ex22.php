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
            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero" required>

            <label for="limite">Límite (1-10):</label>
            <input type="number" id="limite" name="limite" min="1" max="10" required>

            <input type="submit" name="enviar" value="Calcular"><br><br>
        </form>

        <?php
            if (isset($_GET['enviar'])) {
               $tabla = $_GET['numero'];
               $limite = $_GET['limite'];

               for ($i = 1; $i <= $limite; $i++) {
                   $resultado = $tabla * $i;
                   echo $tabla . " x " . $i . " = " . $resultado . "<br>";
               }
            }
        ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Correo</title>
</head>
<body>
    <h1>Formulario de Correo</h1>
    <form method="post" action="procesar.php">
        <!-- Solicitar correo -->
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <!-- Confirmar correo -->
        <label for="confirmar_correo">Confirmar correo electrónico:</label>
        <input type="email" id="confirmar_correo" name="confirmar_correo" required><br><br>

        <!-- Aceptar publicidad -->
        <label>
            <input type="checkbox" name="publicidad" value="Sí">
            Acepto recibir publicidad
        </label><br><br>

        <!-- Botones -->
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
</body>
</html>
