<?php
/**
 * @author Sergio Ricart Alabau
 */
    if (isset($_GET)){

        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $user = isset($_GET['user']) ? $_GET['user'] : '';
        $password = isset($_GET['password']) ? $_GET['password'] : '';
        $particularEmpresa = isset($_GET['particularEmpresa']) ? $_GET['particularEmpresa'] : '';      
        $poblacionAfectada = isset($_GET['poblacionAfectada']) ? $_GET['poblacionAfectada'] : '';
        $elementosAfectados = isset($_GET['elementosAfectados']) ? explode(',', $_GET['elementosAfectados']) : [];
        $necesidades = isset($_GET['necesidades']) ? explode(',', $_GET['necesidades']) : [];
        $LOPDGDD = isset($_GET['LOPDGDD']) ? $_GET['LOPDGDD'] : '';
        $foto = isset($_GET['foto']) ? $_GET['foto'] : '';



        $ruta_foto = "img/" . $foto; // Reconstruir la ruta completa

        // echo "<h2>Datos Recibidos:</h2>";
        // echo "Nombre: $nombre <br>";
        // echo "Contraseña: $password <br>";
        // echo "Nivel de estudios: $nivel_estudios <br>";
        // echo "Nacionalidad: $nacionalidad <br>";
        // echo "Idiomas: <br>";
        // foreach ($idiomas as $idioma) {
        //     echo "- $idioma <br>";
        // }
        // echo "Email: $email <br>";

        // 

    


        echo "<h2 style='color: blue;';>Sus datos han sido enviados correctamente - Sergio Ricart</h2>";
        echo "<i>Nombre Completo:</i><b> $nombre</b><br>";
        echo "<i>Email:</i> <b> $email</b><br>";
        echo "<i>Usuario:</i> <b> $user</b><br>";
        echo "<i>Contraseña:</i>  <b>$password</b><br>";
        echo "<i>Usted es:</i> <b>$particularEmpresa</b>  <br>";
        echo "<i>PoblacionAfectada:</i> <b> $poblacionAfectada </b><br>";
        echo "<i>Elementos Afectados:</i>  <br>";
        foreach ($elementosAfectados as $elemento) {
            echo "-<b> $elemento </b><br>";
        }
        echo "<i>Necesidades:</i>  <br>";
         foreach ($necesidades as $necesidad) {
             echo "- <b>$necesidad</b> <br>";
        }
        echo "<i>Foto:</i> <br>" . "<img src='$ruta_foto' alt='Imagen' style='max-width: 300px'><br>";





    }
?>
