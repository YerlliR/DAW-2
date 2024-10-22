<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sergio Ricart Alabau - Formulario de registro</title>
    </head>
    <body>
        <h1>Sergio Ricart Alabau - Formulario de registro</h1>
        <form action="" method="get">
            <!-- Campo para introducir el nombre -->
            <label for="nombre">Nombre:</label>
            <input type="text" name="name" id="name" maxlength="50">
            <br>
            <br>
            <!-- Campo para introducir los apellidos -->
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" maxlength="200">
            <br>
            <br>
            <!-- Selección de sexo -->
            <label for="sexo">Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="hombre">
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer">
            <label for="mujer">Mujer</label>
            <br>
            <br>
            <!-- Campo para introducir el correo electrónico -->
            <label for="email">Correo:</label>
            <input type="text" name="email" id="email" maxlength="250">
            <br>
            <br>
            <!-- Selección de provincia -->
            <label for="provincia">Provincia:</label>
            <select name="provincia" id="provincia">
                <option value="Alicante">Alicante</option>
                <option value="Castellón">Castellón</option>
                <option value="Valencia">Valencia</option>
            </select>
            <br>
            <br>
            <!-- Checkbox para recibir información sobre novedades y ofertas -->
            <input type="checkbox" id="novedades" name="novedades" checked>
            <label for="novedades">Deseo recibir información sobre novedades y ofertas</label>
            <br>
            <br>
            <!-- Checkbox para aceptar condiciones generales del programa y la normativa sobre protección de datos -->
            <input type="checkbox" id="aceptacion" name="aceptacion">
            <label for="aceptacion">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label>
            <br>
            <br>
            <!-- Botón para enviar el formulario -->
            <input type="submit" name="enviar" id="enviar"value="Enviar">
        </form>
        <?php
            if (isset($_GET['enviar'])) {
                $data = $_GET;
            
                echo "<b>Nombre:</b> " . strtoupper($data['name']) . "<br>";
                echo "<b>Apellidos:</b> " . strtoupper($data['apellidos']) . "<br>";
                echo "<b>Sexo:</b> " . strtoupper($data['sexo']) . "<br>";
                echo "<b>Correo:</b> " . strtoupper($data['email']) . "<br>";
                echo "<b>Provincia:</b> " . strtoupper($data['provincia']) . "<br>";

                if ($data['novedades'] == "on") {
                    echo "<b>Ha seleccionado recibir ofertas</b><br>";
                } else {
                    echo "<b>No ha seleccionado recibir ofertas</b><br>";
                }

                if ($data['aceptacion'] == "on") {
                    echo "<b>Declara haber leído y aceptado las condiciones generales del programa y la normativa sobre protección de datos</b><br>";
                } else {
                    echo "<b>No declara haber leído y aceptado las condiciones generales del programa y la normativa sobre protección de datos</b><br>";
                }
            }

        ?>
    </body>
</html>

