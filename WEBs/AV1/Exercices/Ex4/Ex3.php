<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sergio Ricart Alabau - Formulario de registro</title>
    </head>
    <body>
        <h1>Sergio Ricart Alabau - Formulario de registro 3</h1>
        <form action="" method="get">
            <label for="nombre">Nombre:</label>
            <input type="text" name="name" id="name" maxlength="50">
            <br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" maxlength="200">
            <br><br>
            <label for="email">Correo:</label>
            <input type="text" name="email" id="email" maxlength="250">
            <br><br>
            <label for="username">Usuario:</label>
            <input type="text" name="user" id="user" maxlength="5">
            <br><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" maxlength="15">
            <br><br>
            <label for="sexo">Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="hombre">
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer">
            <label for="mujer">Mujer</label>
            <br><br>
            <label for="provincia">Provincia:</label>
            <select name="provincia" id="provincia">
                <option value="Alicante">Alicante</option>
                <option value="Castellón">Castellón</option>
                <option value="Valencia">Valencia</option>
            </select>
            <br><br>
            <label for="horario">Horario de contacto:</label>
            <select id="horario" name="horario[]" multiple size="2">
                <option value="8-14">De 8 a 14 horas</option>
                <option value="14-18">De 14 a 18 horas</option>
                <option value="18-21">De 18 a 21 horas</option>
            </select>
            <br><br>
            <label for="conocido">¿Cómo nos ha conocido?:</label>
            <input type="checkbox" id="amigo" name="conocido[]" value="amigo">
            <label for="amigo">Un amigo</label>
            <input type="checkbox" id="web" name="conocido[]" value="web">
            <label for="web">Web</label>
            <input type="checkbox" id="prensa" name="conocido[]" value="prensa">
            <label for="prensa">Prensa</label>
            <input type="checkbox" id="otros" name="conocido[]" value="otros">
            <label for="otros">Otros</label>
            <br><br>
            <label for="comentarios">Comentarios:</label>
            <textarea id="comentarios" name="comentarios" rows="6" cols="60"></textarea>
            <br><br>
            <input type="checkbox" id="novedades" name="novedades" checked>
            <label for="novedades">Deseo recibir información sobre novedades y ofertas</label>
            <br><br>
            <input type="checkbox" id="aceptacion" name="aceptacion">
            <label for="aceptacion">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label>
            <br><br>
            <input type="submit" value="Enviar" id="enviar" name="enviar">
            <input type="reset" value="Reset">
        </form>

        <?php
            if (isset($_GET['enviar'])) {
                $data = $_GET;

                echo "<h2>Datos recibidos:</h2>";
                echo "<b>Nombre:</b> " . strtoupper($data['name']) . "<br>";
                echo "<b>Apellidos:</b> " . strtoupper($data['apellidos']) . "<br>";
                echo "<b>Correo:</b> " . strtoupper($data['email']) . "<br>";
                echo "<b>Usuario:</b> " . strtoupper($data['user']) . "<br>";
                echo "<b>Contraseña:</b> " . strtoupper($data['password']) . "<br>";
                echo "<b>Sexo:</b> " . strtoupper($data['sexo']) . "<br>";
                echo "<b>Provincia:</b> " . strtoupper($data['provincia']) . "<br>";

                if (isset($data['horario'])) {
                    echo "<b>Horario de contacto:</b> " . strtoupper(implode(" - ", $data['horario'])) . "<br>";
                } else {
                    echo "<b>Horario de contacto:</b> No seleccionado<br>";
                }

                if (isset($data['conocido'])) {
                    echo "<b>¿Cómo nos ha conocido?:</b> " . strtoupper(implode(" - ", $data['conocido'])) . "<br>";
                } else {
                    echo "<b>¿Cómo nos ha conocido?:</b> No especificado<br>";
                }

                echo "<b>Comentarios:</b> " . strtoupper($data['comentarios']) . "<br>";

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

