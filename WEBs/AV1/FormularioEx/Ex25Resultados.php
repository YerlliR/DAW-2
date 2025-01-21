<?php
    if (isset($_GET['nombre'])) {
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
        $password = isset($_GET['password']) ? $_GET['password'] : '';
        $nivel_estudios = isset($_GET['nivel_estudios']) ? $_GET['nivel_estudios'] : '';
        $nacionalidad = isset($_GET['nacionalidad']) ? $_GET['nacionalidad'] : '';
        $idiomas = isset($_GET['idiomas']) ? $_GET['idiomas'] : [];
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $foto = isset($_GET['foto']) ? $_GET['foto'] : [];


        echo "<h2>Datos Recibidos:</h2>";
        echo "Nombre: $nombre <br>";
        echo "Contraseña: $password <br>";
        echo "Nivel de estudios: $nivel_estudios <br>";
        echo "Nacionalidad: $nacionalidad <br>";
        echo "Idiomas: <br>";
        foreach ($idiomas as $idioma) {
            echo "- $idioma <br>";
        }
        echo "Email: $email <br>";
        echo "<img src='$foto' alt='Imagen' style='max-width: 300px'><br>";
        
    }
?>
