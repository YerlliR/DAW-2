<?php
session_start(); // Inicia la sesión

// Array de trabajadores con sus respectivos salarios
$trabajadores = [
    "Alejandro" => 2000,
    "Peter" => 1400,
    "Silvia" => 1200,
    "Adriana" => 1000
];

// Verifica si se ha enviado el formulario de inicio de sesión
if (isset($_POST['login'])) {
    // Guarda el nombre y el rol en la sesión
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['rol'] = $_POST['rol'];

    // Redirige al usuario según su rol
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
    exit(); // Termina el script después de la redirección
}

// Verifica si se ha enviado el formulario de cierre de sesión
if (isset($_POST['logout'])) {
    session_destroy(); // Destruye la sesión
    header("Location: " . $_SERVER['PHP_SELF']); // Redirige a la misma página
    exit(); // Termina el script después de la redirección
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
            <input type="submit" value="Iniciar Sesión" name="login">
        </fieldset>
    </form>
    
</body>

</html>
