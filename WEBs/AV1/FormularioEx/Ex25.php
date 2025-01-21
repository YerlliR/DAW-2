<?php
    /**
     * @author Sergio Ricart Alabau
     */
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $nivel_estudios = isset($_POST['nivel_estudios']) ? $_POST['nivel_estudios'] : '';
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '';
    $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : [];
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $foto = isset($_FILES['foto']) ? $_FILES['foto'] : [];
    $comprobar = true;
    $directorio_destino = 'uploads/';
    $extensiones_permitidas = ['jpg', 'gif', 'png'];
    $extension_archivo = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $tamano_archivo = $foto['size'];
    $errores = [];

    if (isset($_POST['validar'])) {

        // Comprobar 
        if (empty($nombre)) {
            $errores[] = "Por favor, rellene el campo Nombre Completo";
            $comprobar = false;
        }
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
            $errores[] = "El nombre solo puede contener letras";
            $comprobar = false;
        }
        if (empty($password)) {
            $errores[] = "Por favor, rellene el campo Contraseña";
            $comprobar = false;
        }
        if (strlen($password) < 6) {
            $errores[] = "La contraseña debe tener al menos 6 caracteres";
            $comprobar = false;
        }
        if (empty($nivel_estudios)) {
            $errores[] = "Por favor, seleccione su Nivel de estudios";
            $comprobar = false;
        }
        if (empty($nacionalidad)) {
            $errores[] = "Por favor, seleccione su Nacionalidad";
            $comprobar = false;
        }
        if (empty($idiomas)) {
            $errores[] = "Por favor, seleccione al menos un Idioma";
            $comprobar = false;
        }
        if (empty($email)) {
            $errores[] = "Por favor, rellene el campo Email";
            $comprobar = false;
        }
        if (empty($foto['name'])) {
            $errores[] = "Por favor, adjunte una Foto";
            $comprobar = false;
        }
        if (!in_array($extension_archivo, $extensiones_permitidas)) {
            $errores[] = "La foto debe tener una extensión jpg, gif o png";
            $comprobar = false;
        }
        if ($tamano_archivo > 50000) {
            $errores[] = "La foto debe pesar menos de 50KB";
            $comprobar = false;
        }
        if($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El email no es válido";
            $comprobar = false;
        }
        if (!is_dir($directorio_destino)) {
            mkdir($directorio_destino);
        }

        $nombre_archivo = uniqid() . '.' . $extension_archivo; 
        $ruta_destino = $directorio_destino . $nombre_archivo;

        if (!move_uploaded_file($foto['tmp_name'], $ruta_destino)) {
            $errores[] = "Error al subir la foto.";
            $comprobar = false;
        }
        
        if ($comprobar) {
            echo "<li style='color: green;'>Formulario validado exitosamente</li>";
            echo "<h2>Resultado del Formulario:</h2>";
            echo "Nombre Completo: $nombre<br>";
            echo "Contraseña: $password<br>";
            echo "Nivel de estudios: $nivel_estudios<br>";
            echo "Nacionalidad: $nacionalidad<br>";
            echo "Idiomas: " . implode(", ", $idiomas) . "<br>";
            echo "Email: $email<br>";

            // Mostrar la foto subida
            echo "<img src='$ruta_destino' alt='Imagen' style='max-width: 300px'><br>";
            
        } else {
            echo "<h2>Errores:</h2>";
            echo "<ul>";
            foreach ($errores as $error) {
            echo "<li style='color: red;'>$error</li>";
            }
            echo "</ul>";
        }



        
    }

    if (isset($_POST['resetear'])) {
        $nombre = "";
        $password = "";
        $nivel_estudios = "";
        $nacionalidad = "";
        $idiomas = "";
        $email = "";
        $foto = "";
    }

    if (isset($_POST['enviar']) && $comprobar) {
        $url = "Ex25Resultados.php?nombre=" . urlencode($nombre) .
               "&password=" . urlencode($password) .
               "&nivel_estudios=" . urlencode($nivel_estudios) .
               "&nacionalidad=" . urlencode($nacionalidad) .
               "&idiomas=" . urlencode(implode(",", $idiomas)) .
               "&email=" . urlencode($email) .
               "&foto=" . urlencode($ruta_destino); 
        header("Location: $url");
        exit; 
    }

?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form id="miFormulario" action="" method="post" enctype="multipart/form-data">
            <label for="name">Nombre Completo:</label><br>
            <input id="name" name="nombre" type="text" value="<?php echo $nombre?>"><br><br>

            <label for="password">Contraseña:</label><br>
            <input id="password" name="password" type="password" value="<?php echo $password ?>"><br><br>

            <label for="estudios">Nivel de estudios</label><br>
            <select name="nivel_estudios" id="estudios">
                <option value="Sin Estudios" <?php if ($nivel_estudios == 'Sin Estudios') echo 'selected'; ?>>Sin estudios</option>
                <option value="ESO" <?php if ($nivel_estudios == 'ESO') echo 'selected'; ?>>ESO</option>
                <option value="Bachillerato" <?php if ($nivel_estudios == 'Bachillerato') echo 'selected'; ?>>Bachillerato</option>
                <option value="FP" <?php if ($nivel_estudios == 'FP') echo 'selected'; ?>>FP</option>
                <option value="Grado Universitario" <?php if ($nivel_estudios == 'Grado Universitario') echo 'selected'; ?>>Grado Universitario</option>
            </select><br><br>

            <label for="nacionalidad">Nacionalidad: </label><br>
            <input type="radio" name="nacionalidad" id="nacionalidad_espanola" value="Española" <?php if ($nacionalidad == 'Española') echo 'checked'; ?>>Española <br>
            <input type="radio" name="nacionalidad" id="nacionalidad_otra" value="Otra" <?php if ($nacionalidad == 'Otra') echo 'checked'; ?>>Otra <br><br>

            <label for="idioma">Idiomas:</label><br>
            <select name="idiomas[]" id="idioma" multiple size="5">
                <option value="Español" <?php if (in_array('Español', $idiomas)) echo 'selected'; ?>>Español</option>
                <option value="Inglés" <?php if (in_array('Inglés', $idiomas)) echo 'selected'; ?>>Inglés</option>
                <option value="Francés" <?php if (in_array('Francés', $idiomas)) echo 'selected'; ?>>Francés</option>
                <option value="Alemán" <?php if (in_array('Alemán', $idiomas)) echo 'selected'; ?>>Alemán</option>
                <option value="Italiano" <?php if (in_array('Italiano', $idiomas)) echo 'selected'; ?>>Italiano</option>
            </select>

            <br><br>
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email" value="<?php echo $email ?>"><br><br>

            <label for="foto">Adjuntar Foto:</label><br>
            <input type="hidden" name="fotoOculta" value="<?php echo $foto ?>">
            <input type="file" name="foto" id="foto"><br><br>

            <input type="submit" name="validar" value="Validar">
            <input type="reset" name="resetear" value="resetear">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>

