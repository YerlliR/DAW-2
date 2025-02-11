<?php
session_start();

// Verificar el token
if (!isset($_SESSION['token'])) {
    die("Error: Token no válido.");
}

// Verificar si el usuario ha iniciado sesión y si su rol es 'Sindicalista'
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'Sindicalista') {
    header("Location: index.php");
    exit();
}

// Array de trabajadores con sus respectivos salarios
$trabajadores = [
    "Alejandro" => 2000,
    "Peter" => 1400,
    "Silvia" => 1200,
    "Adriana" => 1000
];

// Función para calcular el salario medio
function salarioMedio($trabajadores) {
    return array_sum($trabajadores) / count($trabajadores);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sindicalista - Sergio Ricart Alabau</title>
</head>

<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?> (Sindicalista) - Sergio Ricart Alabau</h1>
    
    <!-- Formulario para cerrar sesión -->
    <form action="logout.php" method="post">
        <input type="submit" value="Cerrar Sesión" name="logout">
    </form>
    
    <p>Salario medio: <?php echo salarioMedio($trabajadores); ?> €</p>
</body>

</html>