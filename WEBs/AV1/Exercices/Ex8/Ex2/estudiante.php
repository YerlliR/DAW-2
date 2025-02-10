<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: formulario.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Estudiante</title>
</head>
<body>
    <h1>Bienvenido, Estudiante <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></h1>
    <p>Asignatura: <?php echo $_SESSION['asignatura']; ?></p>
    <p>Grupo: <?php echo $_SESSION['grupo']; ?></p>
    <p>Edad: <?php echo ($_SESSION['edad'] == 'mayor') ? "Mayor de edad" : "Menor de edad"; ?></p>
    <p>Cargo: <?php echo ($_SESSION['cargo'] == 'si') ? "Con cargo" : "Sin cargo"; ?></p>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>