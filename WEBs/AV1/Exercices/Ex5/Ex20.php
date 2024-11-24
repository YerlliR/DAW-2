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
    <title>Saludo según la hora</title>
</head>
<body>
    <h1>Saludo según la hora</h1>
    <form method="post" action="">
        <label for="hora">Introduce una hora (0-23):</label>
        <input type="number" id="hora" name="hora" min="0" max="23" required>
        <button type="submit">Mostrar Saludo</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hora = (int)$_POST['hora'];

        // Validar que la hora esté en el rango correcto
        if ($hora < 0 || $hora > 23) {
            echo "<p style='color: red;'>Por favor, introduce una hora válida entre 0 y 23.</p>";
        } else {
            // Determinar el saludo según la hora
            if ($hora >= 6 && $hora <= 12) {
                $saludo = "¡Buenos días!";
            } elseif ($hora >= 13 && $hora <= 20) {
                $saludo = "¡Buenas tardes!";
            } else {
                $saludo = "¡Buenas noches!";
            }

            // Mostrar el saludo
            echo "<h2>$saludo</h2>";
        }
    }
    ?>
</body>
</html>
