<?php
session_start();

// Generar un token único si no existe
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Verificar el token al enviar el formulario
if (isset($_POST['login'])) {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die("Error: Token no válido.");
    }

    // Guardar el nombre y el rol en la sesión
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['rol'] = $_POST['rol'];

    // Redirigir al usuario según su rol
    switch ($_SESSION['rol']) {
        case 'Gerente':
            header("Location: gerente.php");
            break;
        case 'Sindicalista':
            header("Location: sindicalista.php");
            break;
        case 'Responsable de Nóminas':
            header("Location: responsable_nominas.php");
            break;
    }
    exit(); // Terminar el script después de la redirección
}

// Cambiar el SID si se solicita
if (isset($_POST['change_sid'])) {
    session_regenerate_id(true);
    $_SESSION['token'] = bin2hex(random_bytes(32));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Autenticación - Sergio Ricart Alabau</title>
</head>

<body>
    <h1>Formulario de Autenticación - Sergio Ricart Alabau</h1>
    <form action="" method="post">
        <fieldset>
            <legend>Autenticación</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="Gerente">Gerente</option>
                <option value="Sindicalista">Sindicalista</option>
                <option value="Responsable de Nóminas">Responsable de Nóminas</option>
            </select>
            <br>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            <input type="submit" value="Iniciar Sesión" name="login">
        </fieldset>
    </form>
    
    <!-- Botón para cambiar el SID -->
    <form action="" method="post">
        <input type="hidden" name="change_sid" value="1">
        <input type="submit" value="Cambiar SID">
    </form>
</body>

</html>