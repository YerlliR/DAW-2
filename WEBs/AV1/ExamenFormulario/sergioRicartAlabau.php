<?php
    /**
     * @author Sergio Ricart Alabau
     */

    if(isset($_POST)){
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $user = isset($_POST['user']) ? $_POST['user'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';  
        $particularEmpresa = isset($_POST['particularEmpresa']) ? $_POST['particularEmpresa'] : '';  
        $poblacionAfectada = isset($_POST['poblacionAfectada']) ? $_POST['poblacionAfectada'] : '';
        $elementosAfectados = isset($_POST['elementosAfectados']) ? $_POST['elementosAfectados'] : [];
        $necesidades = isset($_POST['necesidades']) ? $_POST['necesidades'] : [];
        $LOPDGDD = isset($_POST['LOPDGDD']) ? $_POST['LOPDGDD'] : '';
        $foto = isset($_FILES['foto']) ? $_FILES['foto'] : [];

        $comprobar = true;
        $directorio_destino = 'img/';
        $extensiones_permitidas = ['png'];
        $extension_archivo = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $tamano_archivo = $foto['size'];
        $errores = [];
        $nombre_archivo = "";

        


        if (isset($_POST['validar'])) {
            if (empty($nombre)) {
                $errores[] = "Por favor, rellene el campo Nombre Completo";
                $comprobar = false;
            }else{
                if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
                    $errores[] = "El nombre solo puede contener letras";
                    $comprobar = false;
                }
            }
            if (empty($email)){
                $errores[] = "Por favor, rellene el campo email";
                $comprobar = false;
            }else{
                if($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores[] = "El email no es válido";
                    $comprobar = false;
                }
            }
            if (empty($password)) {
                $errores[] = "Por favor, rellene el campo Contraseña";
                $comprobar = false;
            }else{
                if (strlen($password) < 6) {
                    $errores[] = "La contraseña debe tener al menos 6 caracteres";
                    $comprobar = false;
                }
            }
            if (empty($poblacionAfectada)) {
                $errores[] = "Por favor, seleccione su localidad afectada";
                $comprobar = false;
            }
            if (empty($elementosAfectados)) {
                $errores[] = "Por favor, seleccione sus elementos afectados";
                $comprobar = false;
            }
            if (empty($necesidades)) {
                $errores[] = "Por favor, seleccione sus necesidades";
                $comprobar = false;
            }
            if (empty($LOPDGDD)) {
                $errores[] = "Por favor acepte LOPDGDD";
                $comprobar = false;
            }
            if (empty($foto['name'])) {
                $errores[] = "Por favor, adjunte una Foto";
                $comprobar = false;
            }else{
                if (!in_array($extension_archivo, $extensiones_permitidas)) {
                    $errores[] = "La foto debe tener una extensión jpg, gif o png";
                    $comprobar = false;
                }else{
                    if ($tamano_archivo > 100000) {
                        $errores[] = "La foto debe pesar menos de 100KB";
                        $comprobar = false;
                    }
                }
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
                echo "Email: $email<br>";
                echo "Usuario: $user<br>";
                echo "Contraseña: $password<br>";
                echo "Usted es: $particularEmpresa<br>";
                echo "PoblacionAfectada: $poblacionAfectada<br>";
                echo "Elementos Afectados: " . implode(", ", $elementosAfectados) . "<br>";
                echo "Necesidades: " . implode(", ", $necesidades) . "<br>";


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
            $nombre = '';
            $email = '';
            $user = '';
            $password = '';      
            $poblacionAfectada = '';
            $elementosAfectados = [];
            $necesidades = [];
            $LOPDGDD = '';
            $foto = [];
        }
        
        if (isset($_POST['enviar']) && $comprobar) {
            $nombre_archivo = isset($_POST['nombre_archivo']) ? $_POST['nombre_archivo'] : '';
        
            $url = "sergioRicartAlabau_ok.php?nombre=" . urlencode($nombre) .
                "&email=" . urlencode($email) .
                "&user=" . urlencode($user) .
                "&password=" . urlencode($password) .
                "&password=" . urlencode($password) .
                "&particularEmpresa=" . urlencode($particularEmpresa) .
                "&poblacionAfectada=" . urlencode($poblacionAfectada) .
                "&elementosAfectados=" . urlencode(implode(",", $elementosAfectados)) .
                "&necesidades=" . urlencode(implode(",", $necesidades)) .
                "&LOPDGDD=" . urlencode($LOPDGDD) .
                "&foto=" . urlencode($nombre_archivo);
            header("Location: $url");
            exit;
        }  
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

            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email" value="<?php echo $email ?>"><br><br>

            <label for="usuer">Usuario:</label><br>
            <input id="user" name="user" type="text" value="<?php echo $user?>"><br><br>

            <label for="password">Contraseña:</label><br>
            <input id="password" name="password" type="password" value="<?php echo $password ?>"><br><br>


            <label for="particularEmpresa">Selecciona: </label><br>
            <input type="radio" name="particularEmpresa" id="particular" value="Particular" <?php if ($particularEmpresa == 'Particular') echo 'checked'; ?>>Particular <br>
            <input type="radio" name="particularEmpresa" id="empresa" value="Empresa" <?php if ($particularEmpresa == 'Empresa') echo 'checked'; ?>>Empresa <br><br>




            <label for="poblacionAfectada">Poblacion Afectada:</label><br>
            <select name="poblacionAfectada" id="poblacionAfectada">
                <option value="Aldaia" <?php if ($poblacionAfectada == 'Aldaia') echo 'selected'; ?>>Aldaia</option>
                <option value="Catarroja" <?php if ($poblacionAfectada == 'Catarroja') echo 'selected'; ?>>Catarroja</option>
                <option value="Paiporta" <?php if ($poblacionAfectada == 'Paiporta') echo 'selected'; ?>>Paiporta</option>
                <option value="Picaña" <?php if ($poblacionAfectada == 'Picaña') echo 'selected'; ?>>Picaña</option>
                <option value="Sedaví" <?php if ($poblacionAfectada == 'Sedaví') echo 'selected'; ?>>Sedaví</option>
            </select><br><br>

            

            <label for="elementosAfectados">Elementos Afectados:</label><br>
            <select name="elementosAfectados[]" id="elementosAfectados" multiple size="5">
                <option value="Casa" <?php if (in_array('Casa', $elementosAfectados)) echo 'selected'; ?>>Casa</option>
                <option value="Bajo Comercial" <?php if (in_array('Bajo Comercial', $elementosAfectados)) echo 'selected'; ?>>Bajo Comercial</option>
                <option value="Sótano Garaje" <?php if (in_array('Sótano Garaje', $elementosAfectados)) echo 'selected'; ?>>Sótano Garaje</option>
                <option value="Trastero" <?php if (in_array('Trastero', $elementosAfectados)) echo 'selected'; ?>>Trastero</option>
                <option value="Vehículo" <?php if (in_array('Vehículo', $elementosAfectados)) echo 'selected'; ?>>Vehículo</option>
            </select> 

            <br><br>
            <label for="necesidades">Necesidades</label><br>
            <input type="checkbox" name="necesidades[]" value="Extraccion de Lodo" <?php if (in_array('extraccionLodo', $necesidades)) echo 'checked'; ?>>Extraccion Lodo <br>
            <input type="checkbox" name="necesidades[]" value="Limpieza" <?php if (in_array('limpieza', $necesidades)) echo 'checked'; ?>>Limpieza<br>
            <input type="checkbox" name="necesidades[]" value="Desinfeccion Y Secado" <?php if (in_array('desinfeccionYSecado', $necesidades)) echo 'checked'; ?>>Desinfeccion Y Secado<br>
            <input type="checkbox" name="necesidades[]" value="Revision Estructura" <?php if (in_array('revisionEstructura', $necesidades)) echo 'checked'; ?>>Revision de Estructura<br>
            <input type="checkbox" name="necesidades[]" value="Tarea Recontruccion" <?php if (in_array('tareaRecontruccion', $necesidades)) echo 'checked'; ?>>Tareas de Recontruccion<br>
            <input type="checkbox" name="necesidades[]" value="Excarcealcion Coche" <?php if (in_array('excarcealcionCoche', $necesidades)) echo 'checked'; ?>>Excarcealcion Coche<br><br>


            <input type="checkbox" name="LOPDGDD" value="LOPDGDD" <?php if ($LOPDGDD == 'LOPDGDD') echo 'checked';?>>Aceptas LOPDGDD: <br><br>



            <label for="foto">Adjuntar Foto:</label><br>
            <input type="hidden" name="nombre_archivo" value="<?php echo $nombre_archivo; ?>">
            <input type="file" name="foto" id="foto"><br><br>

            <input type="submit" name="validar" value="Validar">
            <input type="submit" name="resetear" value="Resetear">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>