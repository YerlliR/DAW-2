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
    'apellidos' => '',
    'edad' => '',
    'peso' => '',
    'sexo' => '',
    'estado_civil' => '',
    'aficiones' => []
];

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos
    $data['nombre'] = $_POST['nombre'] ?? '';
    $data['apellidos'] = $_POST['apellidos'] ?? '';
    $data['edad'] = $_POST['edad'] ?? '';
    $data['peso'] = $_POST['peso'] ?? '';
    $data['sexo'] = $_POST['sexo'] ?? '';
    $data['estado_civil'] = $_POST['estado_civil'] ?? '';
    $data['aficiones'] = $_POST['aficiones'] ?? [];

    // Validar campos obligatorios
    if (empty($data['nombre'])) $errors[] = "El nombre es obligatorio.";
    if (empty($data['apellidos'])) $errors[] = "Los apellidos son obligatorios.";
    if (empty($data['edad']) || !ctype_digit($data['edad'])) $errors[] = "La edad debe ser un número.";
    if (empty($data['peso']) || !is_numeric($data['peso'])) $errors[] = "El peso debe ser un número.";
    if (empty($data['sexo'])) $errors[] = "Debe seleccionar el sexo.";
    if (empty($data['estado_civil'])) $errors[] = "Debe seleccionar un estado civil.";

    // Si no hay errores, guardar los datos y redirigir
    if (empty($errors)) {
        session_start();
        $_SESSION['data'] = $data;
        header('Location: mostrar.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulario</h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($data['nombre']) ?>"></label><br>
        <label>Apellidos: <input type="text" name="apellidos" value="<?= htmlspecialchars($data['apellidos']) ?>"></label><br>
        <label>Edad: <input type="number" name="edad" value="<?= htmlspecialchars($data['edad']) ?>"></label><br>
        <label>Peso: <input type="number" name="peso" step="0.1" value="<?= htmlspecialchars($data['peso']) ?>"></label><br>
        <label>Sexo: 
            <input type="radio" name="sexo" value="Masculino" <?= $data['sexo'] == 'Masculino' ? 'checked' : '' ?>> Masculino
            <input type="radio" name="sexo" value="Femenino" <?= $data['sexo'] == 'Femenino' ? 'checked' : '' ?>> Femenino
        </label><br>
        <label>Estado Civil:
            <select name="estado_civil">
                <option value="">Seleccione...</option>
                <option value="Soltero" <?= $data['estado_civil'] == 'Soltero' ? 'selected' : '' ?>>Soltero</option>
                <option value="Casado" <?= $data['estado_civil'] == 'Casado' ? 'selected' : '' ?>>Casado</option>
                <option value="Viudo" <?= $data['estado_civil'] == 'Viudo' ? 'selected' : '' ?>>Viudo</option>
                <option value="Divorciado" <?= $data['estado_civil'] == 'Divorciado' ? 'selected' : '' ?>>Divorciado</option>
                <option value="Otro" <?= $data['estado_civil'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
            </select>
        </label><br>
        <label>Aficiones:</label><br>
        <input type="checkbox" name="aficiones[]" value="Cine" <?= in_array('Cine', $data['aficiones']) ? 'checked' : '' ?>> Cine<br>
        <input type="checkbox" name="aficiones[]" value="Deporte" <?= in_array('Deporte', $data['aficiones']) ? 'checked' : '' ?>> Deporte<br>
        <input type="checkbox" name="aficiones[]" value="Literatura" <?= in_array('Literatura', $data['aficiones']) ? 'checked' : '' ?>> Literatura<br>
        <input type="checkbox" name="aficiones[]" value="Música" <?= in_array('Música', $data['aficiones']) ? 'checked' : '' ?>> Música<br>
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
</body>
</html>
