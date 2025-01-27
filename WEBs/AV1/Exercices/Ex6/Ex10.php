<?php
// Si el formulario ha sido enviado, guardamos la preferencia en una cookie
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Guardamos la preferencia en una cookie
        $publicidad = isset($_POST['publicidad']) ? 'Sí' : 'No';
        setcookie('publicidad', $publicidad, time() + 3600, '/'); // La cookie dura 1 hora
    }

    // Recuperamos la preferencia de la cookie (si existe)
    $preferenciaAnterior = isset($_COOKIE['publicidad']) ? $_COOKIE['publicidad'] : 'No especificado';
    $preferenciaNueva = isset($publicidad) ? $publicidad : $preferenciaAnterior;
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Correo</title>
    </head>
    <body>
        <h1>Formulario de Correo</h1>
        <form method="post" action="">
            <!-- Solicitar correo -->
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br><br>

            <!-- Confirmar correo -->
            <label for="confirmar_correo">Confirmar correo electrónico:</label>
            <input type="email" id="confirmar_correo" name="confirmar_correo" required><br><br>

            <!-- Aceptar publicidad -->
            <label>
                <input type="checkbox" name="publicidad" value="Sí" <?php echo $preferenciaNueva === 'Sí' ? 'checked' : ''; ?>>
                Acepto recibir publicidad
            </label><br><br>

            <!-- Botones -->
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
        </form>

        <!-- Mostrar la preferencia anterior y la nueva -->
        <h2>Preferencia de Publicidad</h2>
        <p>Preferencia anterior: <?php echo $preferenciaAnterior; ?></p>
        <p>Preferencia nueva: <?php echo $preferenciaNueva; ?></p>
    </body>
</html>
