<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header('Location: formulario.php');
    exit();
}

$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$asignatura = $_SESSION['asignatura'];
$grupo = $_SESSION['grupo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Profesor</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $nombre . ' ' . $apellido; ?></h2>
    <p>Asignatura: <?php echo $asignatura; ?></p>
    <p>Grupo: <?php echo $grupo; ?></p>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>