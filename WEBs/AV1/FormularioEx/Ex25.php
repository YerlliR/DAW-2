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
        <form action="" method="post" enctype="multipart/form-data"></form></form>
            <label for="name">Nombre Completo:</label><br>
            <input id="name" name="nombre" type="text"><br><br>

            <label for="password">Contraseña:</label><br>
            <input id="password" name="password" type="password"><br><br>

            <label for="estudios">Nivel de estudios</label><br>
            <select name="nivel_estudios" id="estudios">
                <option value="Sin Estudios">Sin estudios</option>
                <option value="ESO">ESO</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="FP">FP</option>
                <option value="Grado Universitario">Grado Universitario</option>
            </select><br><br>

            <label for="nacionalidad">Nacionalidad: </label><br>
            <input type="radio" name="nacionalidad" id="nacionalidad_espanola" value="Española">Española <br>
            <input type="radio" name="nacionalidad" id="nacionalidad_otra" value="Otra">Otra <br><br>

            <label for="idioma">Idiomas:</label><br>
            <select name="idiomas[]" id="idioma" multiple>
                <option value="Español">Español</option>
                <option value="Inglés">Inglés</option>
                <option value="Francés">Francés</option>
                <option value="Alemán">Alemán</option>
                <option value="Italiano">Italiano</option>
            </select>

            <br><br>
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email"><br><br>

            <label for="foto">Adjuntar Foto:</label><br>
            <input type="file" name="foto" id="foto"><br><br>
            
            <input type="submit" name="validar" value="Validar">
            <input type="reset" value="Resetear">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>

<?php
    if (isset($_POST['validar'])) {
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $nivel_estudios = $_POST['nivel_estudios'];
        $nacionalidad = $_POST['nacionalidad'];
        $idiomas = $_POST['idiomas'];
        $email = $_POST['email'];
        $foto = $_FILES['foto'];
        $extensiones_permitidas = ['jpg', 'gif', 'png'];
        $extension_archivo = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $tamano_archivo = $foto['size'];

        // Comprobar que están llenos todos los campos
        if (empty($nombre) || empty($password) || empty($nivel_estudios) || empty($nacionalidad) || empty($idiomas) || empty($email) || empty($foto['name'])) {
            echo "Por favor, rellene todos los campos";
        } else {
            if (strlen($password) < 6) {
                echo "La contraseña debe tener al menos 6 caracteres";
            }
            if (!in_array($extension_archivo, $extensiones_permitidas)) {
                echo "La foto debe tener una extensión jpg, gif o png";
            }
            if ($tamano_archivo > 50000) {
                echo "La foto debe pesar menos de 50KB";
            }
        }
    }
?>
