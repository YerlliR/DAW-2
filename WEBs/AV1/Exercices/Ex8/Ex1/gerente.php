<?php
session_start();

// Verifica si el usuario ha iniciado sesión y si su rol es 'Gerente'
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'Gerente') {
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

// Función para obtener el salario máximo
function salarioMax($trabajadores) {
    return max($trabajadores);
}

// Función para obtener el salario mínimo
function salarioMin($trabajadores) {
    return min($trabajadores);
}

// Función para obtener el salario medio
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
    <title>Gerente - Sergio Ricart Alabau</title>
</head>

<body>
    <!-- Muestra un mensaje de bienvenida con el nombre del gerente -->
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?> (Gerente) - Sergio Ricart Alabau</h1>
    
    <!-- Formulario para cerrar sesión -->
    <form action="logout.php" method="post">
        <input type="submit" value="Cerrar Sesión" name="logout">
    </form>
    
    <!-- Muestra el salario máximo -->
    <p>Salario máximo: <?php echo salarioMax($trabajadores); ?> €</p>
    
    <!-- Muestra el salario mínimo -->
    <p>Salario mínimo: <?php echo salarioMin($trabajadores); ?> €</p>
    
    <!-- Muestra el salario medio -->
    <p>Salario medio: <?php echo salarioMedio($trabajadores); ?> €</p>
</body>

</html>
