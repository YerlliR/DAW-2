<?php
session_start();

// Verificar si existen los datos y errores en la sesión
if (!isset($_SESSION['data']) || !isset($_SESSION['file_path'])) {
    echo "No se han recibido datos.";
    exit;
}

// Recoger datos de la sesión
$data = $_SESSION['data'];
$file_path = $_SESSION['file_path'];

// Limpiar la sesión para evitar que los datos se mantengan después de mostrar
unset($_SESSION['data']);
unset($_SESSION['file_path']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Recibidos</title>
</head>
<body>
    <h1>Datos del Formulario</h1>
    <ul>
        <li><strong>Nombre completo:</strong> <?= htmlspecialchars($data['nombre']) ?></li>
        <li><strong>Contraseña:</strong> <?= htmlspecialchars($data['password']) ?></li>
        <li><strong>Nivel de estudios:</strong> <?= htmlspecialchars($data['nivel_estudios']) ?></li>
        <li><strong>Nacionalidad:</strong> <?= htmlspecialchars($data['nacionalidad']) ?></li>
        <li><strong>Idiomas:</strong> <?= implode(', ', $data['idiomas']) ?></li>
        <li><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></li>
    </ul>
    
    <h2>Foto subida:</h2>
    <?php if (file_exists($file_path)): ?>
        <img src="<?= htmlspecialchars($file_path) ?>" alt="Foto subida" width="200">
    <?php else: ?>
        <p>No se ha encontrado la foto.</p>
    <?php endif; ?>
</body>
</html>
