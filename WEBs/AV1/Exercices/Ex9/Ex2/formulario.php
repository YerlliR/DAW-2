<?php
session_start();

// Generar un token único si no existe
if (empty($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Identificación</title>
</head>
<body>
    <h1>Formulario de Identificación</h1>
    <form action="procesar.php" method="post">
        <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="asignatura">Asignatura:</label><br>
        <input type="text" id="asignatura" name="asignatura" required><br><br>

        <label for="grupo">Grupo:</label><br>
        <input type="text" id="grupo" name="grupo" required><br><br>

        <label>¿Es mayor de edad?</label><br>
        <input type="radio" id="mayor" name="edad" value="mayor" required>
        <label for="mayor">Sí</label><br>
        <input type="radio" id="menor" name="edad" value="menor">
        <label for="menor">No</label><br><br>

        <label>¿Tiene Cargo?</label><br>
        <input type="radio" id="cargo" name="cargo" value="cargo" required>
        <label for="cargo">Con Cargo</label><br>
        <input type="radio" id="noCargo" name="cargo" value="NoCargo">
        <label for="noCargo">Sin Cargo</label><br><br>

        <input type="submit" value="Enviar">
    </form>

    <form action="cambiar_sid.php" method="post">
        <input type="submit" value="Cambiar SID">
    </form>
</body>
</html>