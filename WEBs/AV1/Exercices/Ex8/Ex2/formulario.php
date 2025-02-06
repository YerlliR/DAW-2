<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Identificación</title>
</head>
<body>
    <h2>Identificación de Usuario</h2>
    <form action="procesar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>
        
        <label for="asignatura">Asignatura:</label>
        <input type="text" id="asignatura" name="asignatura" required><br><br>
        
        <label for="grupo">Grupo:</label>
        <input type="text" id="grupo" name="grupo" required><br><br>
        
        <label>Edad:</label>
        <input type="radio" id="mayor" name="edad" value="mayor" required> Mayor de edad
        <input type="radio" id="menor" name="edad" value="menor"> Menor de edad<br><br>
        
        <label>Cargo:</label>
        <input type="radio" id="con_cargo" name="cargo" value="con_cargo" required> Con cargo
        <input type="radio" id="sin_cargo" name="cargo" value="sin_cargo"> Sin cargo<br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>