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
    'password' => '',
    'nivel_estudios' => '',
    'nacionalidad' => '',
    'idiomas' => [],
    'email' => ''
];
$uploadDir = 'uploads/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos
    $data['nombre'] = trim($_POST['nombre'] ?? '');
    $data['password'] = $_POST['password'] ?? '';
    $data['nivel_estudios'] = $_POST['nivel_estudios'] ?? '';
    $data['nacionalidad'] = $_POST['nacionalidad'] ?? '';
    $data['idiomas'] = $_POST['idiomas'] ?? [];
    $data['email'] = trim($_POST['email'] ?? '');

    // Validar datos
    if (empty($data['nombre'])) $errors[] = "El nombre completo es obligatorio.";
    if (strlen($data['password']) < 6) $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    if (empty($data['nivel_estudios'])) $errors[] = "Debe seleccionar un nivel de estudios.";
    if (empty($data['nacionalidad'])) $errors[] = "Debe seleccionar una nacionalidad.";
    if (empty($data['idiomas'])) $errors[] = "Debe seleccionar al menos un idioma.";
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "El email no es válido.";

    // Validar archivo
    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Debe subir una foto.";
    } else {
        $file = $_FILES['foto'];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $maxSize = 50 * 1024; // 50 KB
        $fileSize = $file['size'];
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Comprobar extensión
        if (!in_array($fileExt, $allowedExtensions)) {
            $errors[] = "La foto debe tener una extensión válida (jpg, jpeg, png, gif).";
        }

        // Comprobar tamaño
        if ($fileSize > $maxSize) {
            $errors[] = "La foto no puede superar los 50 KB.";
        }

        // Comprobar directorio
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                $errors[] = "No se pudo crear el directorio para guardar las fotos.";
            }
        }
    }

    // Si no hay errores, guardar archivo y redirigir
    if (empty($errors)) {
        $uniqueName = uniqid('foto_', true) . '.' . $fileExt;
        $targetFile = $uploadDir . $uniqueName;

        if (move_uploaded_file($fileTmp, $targetFile)) {
            session_start();
            $_SESSION['data'] = $data;
            $_SESSION['file_path'] = $targetFile;
            header('Location: exito.php');
            exit;
        } else {
            $errors[] = "Error al guardar la foto.";
        }
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
    <h1>Formulario de Registro</h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Nombre completo: <input type="text" name="nombre" value="<?= htmlspecialchars($data['nombre']) ?>"></label><br>
        <label>Contraseña: <input type="password" name="password"></label><br>
        <label>Nivel de Estudios:
            <select name="nivel_estudios">
                <option value="">Seleccione...</option>
                <option value="Sin estudios" <?= $data['nivel_estudios'] == 'Sin estudios' ? 'selected' : '' ?>>Sin estudios</option>
                <option value="ESO" <?= $data['nivel_estudios'] == 'ESO' ? 'selected' : '' ?>>ESO</option>
                <option value="Bachillerato" <?= $data['nivel_estudios'] == 'Bachillerato' ? 'selected' : '' ?>>Bachillerato</option>
                <option value="FP" <?= $data['nivel_estudios'] == 'FP' ? 'selected' : '' ?>>Formación Profesional</option>
                <option value="Universidad" <?= $data['nivel_estudios'] == 'Universidad' ? 'selected' : '' ?>>Estudios Universitarios</option>
            </select>
        </label><br>
        <label>Nacionalidad:
            <input type="radio" name="nacionalidad" value="Española" <?= $data['nacionalidad'] == 'Española' ? 'checked' : '' ?>> Española
            <input type="radio" name="nacionalidad" value="Otra" <?= $data['nacionalidad'] == 'Otra' ? 'checked' : '' ?>> Otra
        </label><br>
        <label>Idiomas:</label><br>
        <input type="checkbox" name="idiomas[]" value="Español" <?= in_array('Español', $data['idiomas']) ? 'checked' : '' ?>> Español<br>
        <input type="checkbox" name="idiomas[]" value="Inglés" <?= in_array('Inglés', $data['idiomas']) ? 'checked' : '' ?>> Inglés<br>
        <input type="checkbox" name="idiomas[]" value="Francés" <?= in_array('Francés', $data['idiomas']) ? 'checked' : '' ?>> Francés<br>
        <input type="checkbox" name="idiomas[]" value="Alemán" <?= in_array('Alemán', $data['idiomas']) ? 'checked' : '' ?>> Alemán<br>
        <input type="checkbox" name="idiomas[]" value="Italiano" <?= in_array('Italiano', $data['idiomas']) ? 'checked' : '' ?>> Italiano<br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>"></label><br>
        <label>Adjuntar Foto: <input type="file" name="foto"></label><br>
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
</body>
</html>
