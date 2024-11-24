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
    <title>Hora por Zona Horaria</title>
</head>
<body>
    <h1>Hora Actual por Zona Horaria</h1>
    <form method="post" action="">
        <label for="zona">Selecciona una zona horaria:</label>
        <select name="zona" id="zona" required>
            <option value="">--Selecciona una zona horaria--</option>
            <option value="America/New_York">Nueva York (EST)</option>
            <option value="America/Los_Angeles">Los Ángeles (PST)</option>
            <option value="Europe/London">Londres (GMT)</option>
            <option value="Europe/Madrid">Madrid (CET)</option>
            <option value="Asia/Tokyo">Tokio (JST)</option>
            <option value="Asia/Dubai">Dubái (GST)</option>
            <option value="Australia/Sydney">Sídney (AEDT)</option>
            <option value="Africa/Johannesburg">Johannesburgo (SAST)</option>
            <option value="America/Bogota">Bogotá (COT)</option>
            <option value="America/Mexico_City">Ciudad de México (CST)</option>
            <option value="America/Sao_Paulo">São Paulo (BRT)</option>
            <option value="Asia/Shanghai">Shanghái (CST)</option>
            <option value="Asia/Kolkata">Calcuta (IST)</option>
            <option value="Europe/Paris">París (CET)</option>
            <option value="Europe/Berlin">Berlín (CET)</option>
            <option value="Pacific/Auckland">Auckland (NZDT)</option>
            <option value="America/Chicago">Chicago (CST)</option>
            <option value="Asia/Singapore">Singapur (SGT)</option>
            <option value="Europe/Rome">Roma (CET)</option>
            <option value="America/Toronto">Toronto (EST)</option>
        </select>
        <br><br>
        <button type="submit">Mostrar Hora</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $zona = $_POST['zona'];

        // Validar que se haya seleccionado una zona horaria
        if (empty($zona)) {
            echo "<p>Por favor, selecciona una zona horaria válida.</p>";
        } else {
            // Establecer la zona horaria seleccionada
            date_default_timezone_set($zona);

            // Obtener la hora actual
            $hora_actual = date('Y-m-d H:i:s');

            // Mostrar la hora actual en la zona seleccionada
            echo "<h2>La hora actual en <strong>" . htmlspecialchars($zona) . "</strong> es:</h2>";
            echo "<p><strong>$hora_actual</strong></p>";
        }
    }
    ?>
</body>
</html>
