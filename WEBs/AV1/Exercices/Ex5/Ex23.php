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
$errors = [];
$data = [
    'nombre' => '',
    'apellido' => '',
    'email' => '',
    'nivel_estudios' => '',
    'situacion' => [],
    'hobbies' => [],
    'otro_hobby' => ''
];

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos
    $data['nombre'] = trim($_POST['nombre']);
    $data['apellido'] = trim($_POST['apellido']);
    $data['email'] = trim($_POST['email']);
    $data['nivel_estudios'] = $_POST['nivel_estudios'] ?? '';
    $data['situacion'] = $_POST['situacion'] ?? [];
    $data['hobbies'] = $_POST['hobbies'] ?? [];
    $data['otro_hobby'] = trim($_POST['otro_hobby']);

    // Validar datos
    if (empty($data['nombre'])) {
        $errors['nombre'] = "El nombre es obligatorio.";
    }
    if (empty($data['apellido'])) {
        $errors['apellido'] = "El apellido es obligatorio.";
    }
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El email no es válido.";
    }
    if (empty($data['nivel_estudios'])) {
        $errors['nivel_estudios'] = "Debe seleccionar un nivel de estudios.";
    }
    if (empty($data['situacion'])) {
        $errors['situacion'] = "Debe seleccionar al menos una situación.";
    }
    if (empty($data['hobbies']) && empty($data['otro_hobby'])) {
        $errors['hobbies'] = "Debe seleccionar al menos un hobby o escribir uno.";
    }

    // Si no hay errores, redirigir a la segunda página
    if (empty($errors)) {
        session_start();
        $_SESSION['data'] = $data;
        header('Location: mostrar_datos.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Recogida de Datos</title>
</head>
<body>
    <h1>Formulario de Recogida de Datos</h1>
    <form method="POST" action="">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($data['nombre']) ?>">
        <?= $errors['nombre'] ?? '' ?>
        <br>

        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?= htmlspecialchars($data['apellido']) ?>">
        <?= $errors['apellido'] ?? '' ?>
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>">
        <?= $errors['email'] ?? '' ?>
        <br>

        <label>Nivel de estudios:</label>
        <select name="nivel_estudios">
            <option value="">Seleccione...</option>
            <option value="Primaria" <?= $data['nivel_estudios'] == 'Primaria' ? 'selected' : '' ?>>Primaria</option>
            <option value="Secundaria" <?= $data['nivel_estudios'] == 'Secundaria' ? 'selected' : '' ?>>Secundaria</option>
            <option value="Universidad" <?= $data['nivel_estudios'] == 'Universidad' ? 'selected' : '' ?>>Universidad</option>
        </select>
        <?= $errors['nivel_estudios'] ?? '' ?>
        <br>

        <label>Situación actual:</label><br>
        <input type="checkbox" name="situacion[]" value="Estudiando" <?= in_array('Estudiando', $data['situacion']) ? 'checked' : '' ?>> Estudiando
        <input type="checkbox" name="situacion[]" value="Trabajando" <?= in_array('Trabajando', $data['situacion']) ? 'checked' : '' ?>> Trabajando
        <input type="checkbox" name="situacion[]" value="Buscando empleo" <?= in_array('Buscando empleo', $data['situacion']) ? 'checked' : '' ?>> Buscando empleo
        <input type="checkbox" name="situacion[]" value="Desempleado" <?= in_array('Desempleado', $data['situacion']) ? 'checked' : '' ?>> Desempleado
        <?= $errors['situacion'] ?? '' ?>
        <br>

        <label>Hobbies:</label><br>
        <input type="checkbox" name="hobbies[]" value="Deporte" <?= in_array('Deporte', $data['hobbies']) ? 'checked' : '' ?>> Deporte
        <input type="checkbox" name="hobbies[]" value="Música" <?= in_array('Música', $data['hobbies']) ? 'checked' : '' ?>> Música
        <input type="checkbox" name="hobbies[]" value="Lectura" <?= in_array('Lectura', $data['hobbies']) ? 'checked' : '' ?>> Lectura
        <label>Otro:</label>
        <input type="text" name="otro_hobby" value="<?= htmlspecialchars($data['otro_hobby']) ?>">
        <?= $errors['hobbies'] ?? '' ?>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
