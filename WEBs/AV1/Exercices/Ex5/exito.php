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

if (!isset($_SESSION['data']) || !isset($_SESSION['file_path'])) {
    header('Location: formulario.php');
    exit;
}

$data = $_SESSION['data'];
$filePath = $_SESSION['file_path'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Procesado</title>
</head>
<body>
    <h1>Formulario Procesado con Éxito</h1>
    <p><strong>Nombre completo:</strong> <?= htmlspecialchars($data['nombre']) ?></p>
    <p><strong>Nivel de Estudios:</strong> <?= htmlspecialchars($data['nivel_estudios']) ?></p>
    <p><strong>Nacionalidad:</strong> <?= htmlspecialchars($data['nacionalidad']) ?></p>
    <p><strong>Idiomas:</strong> <?= htmlspecialchars(implode(', ', $data['idiomas'])) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
    <p><strong>Foto subida:</strong> <img src="<?= htmlspecialchars($filePath) ?>" alt="Foto subida" style="max-width: 200px;"></p>
    <p><strong>Desarrollado por:</strong> Tu Nombre, Grupo de Clase</p>
</body>
</html>
