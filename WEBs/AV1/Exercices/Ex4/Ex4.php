<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno - Formulario de registro 4</title>
</head>
<body>
    <h1>Alumno - Formulario de registro 4</h1>
    <form action="" method="get">
        <fieldset>
            <legend>Datos personales</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" name="name" id="name" maxlength="50" placeholder="Escriba su nombre">
            <br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" maxlength="200" placeholder="Escriba sus apellidos">
            <br><br>
            <label for="email">Correo:</label>
            <input type="text" name="email" id="email" maxlength="250" placeholder="usuario@empresa.com">
            <br><br>
            <label for="username">Usuario:</label>
            <input type="text" name="user" id="user" maxlength="5" placeholder="Introduce tu usuario">
            <br><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" maxlength="15" placeholder="Introduce tu contraseña">
            <br><br>
            <label for="sexo">Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="hombre" checked>
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer">
            <label for="mujer">Mujer</label>
        </fieldset>
        <br>
        <fieldset>
            <legend>Datos de contacto</legend>
            <label for="provincia">Provincia:</label>
            <select name="provincia" id="provincia">
                <option value="Alicante">Alicante</option>
                <option value="Castellón">Castellón</option>
                <option value="Valencia">Valencia</option>
            </select>
            <br><br>
            <label for="horario">Horario de contacto:</label>
            <select id="horario" name="horario[]" multiple size="3">
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
        </fieldset>
        <br>
        <fieldset>
            <legend>Datos de la incidencia</legend>
            <label for="tipo_incidencia">Tipo de incidencia:</label>
            <select name="tipo_incidencia" id="tipo_incidencia">
                <option value="Teléfono fijo">Teléfono fijo</option>
                <option value="Teléfono móvil">Teléfono móvil</option>
                <option value="Internet">Internet</option>
                <option value="Televisión">Televisión</option>
            </select>
            <br><br>
            <label for="descripcion">Descripción de la incidencia:</label>
            <textarea id="descripcion" name="descripcion" rows="4" cols="40" placeholder="Describe la incidencia"></textarea>
        </fieldset>
        <br>
        <fieldset>
            <input type="submit" value="Enviar" name="enviar" id="enviar">
            <input type="reset" value="Reset">
        </fieldset>
    </form>

    <?php
    if (isset($_GET['enviar'])) {
        $data = $_GET;

        // Mostrar datos recibidos
        echo "<h2>Datos recibidos:</h2>";
        echo "<b>Nombre:</b> " . strtoupper($data['name']) . "<br>";
        echo "<b>Apellidos:</b> " . strtoupper($data['apellidos']) . "<br>";
        echo "<b>Correo:</b> " . strtoupper($data['email']) . "<br>";
        echo "<b>Usuario:</b> " . strtoupper($data['user']) . "<br>";
        echo "<b>Contraseña:</b> " . strtoupper($data['password']) . "<br>";
        echo "<b>Sexo:</b> " . strtoupper($data['sexo']) . "<br>";
        echo "<b>Provincia:</b> " . strtoupper($data['provincia']) . "<br>";

        // Mostrar horarios seleccionados
        echo "<b>Horario de contacto:</b> " . strtoupper(implode(" - ", $data['horario'])) . "<br>";

        // Mostrar cómo nos ha conocido
        echo "<b>¿Cómo nos ha conocido?:</b> " . (isset($data['conocido']) ? strtoupper(implode(" - ", $data['conocido'])) : 'NO ESPECIFICADO') . "<br>";

        echo "<b>Tipo de incidencia:</b> " . strtoupper($data['tipo_incidencia']) . "<br>";
        echo "<b>Descripción de la incidencia:</b> " . strtoupper($data['descripcion']) . "<br>";
    }
    ?>
</body>
</html>
