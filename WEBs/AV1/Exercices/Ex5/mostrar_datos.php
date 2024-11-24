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

<?php
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: Ex23.php');
    exit;
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Introducidos</title>
</head>
<body>
    <h1>Datos Introducidos</h1>
    <p>Nombre: <?= htmlspecialchars($data['nombre']) ?></p>
    <p>Apellido: <?= htmlspecialchars($data['apellido']) ?></p>
    <p>Email: <?= htmlspecialchars($data['email']) ?></p>
    <p>Nivel de estudios: <?= htmlspecialchars($data['nivel_estudios']) ?></p>
    <p>Situación actual: <?= htmlspecialchars(implode(', ', $data['situacion'])) ?></p>
    <p>Hobbies: <?= htmlspecialchars(implode(', ', $data['hobbies'])) ?></p>
    <?php if (!empty($data['otro_hobby'])): ?>
        <p>Otro hobby: <?= htmlspecialchars($data['otro_hobby']) ?></p>
    <?php endif; ?>
</body>
</html>
