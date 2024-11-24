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
    <title>Resultados del Formulario</title>
</head>
<body>
    <h1>Resultados del Formulario</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $correo = $_POST['correo'];
        $confirmar_correo = $_POST['confirmar_correo'];
        $publicidad = isset($_POST['publicidad']) ? 'Sí' : 'No';

        // Verificar si los correos coinciden
        if ($correo === $confirmar_correo) {
            echo "<p><strong>Correo electrónico:</strong> " . htmlspecialchars($correo) . "</p>";
            echo "<p><strong>¿Acepta recibir publicidad?</strong> " . htmlspecialchars($publicidad) . "</p>";
        } else {
            echo "<p style='color: red;'>Error: Los correos electrónicos no coinciden.</p>";
            echo "<a href='formulario.php'>Volver al formulario</a>";
        }
    }
    ?>
</body>
</html>
