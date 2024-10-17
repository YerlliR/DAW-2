<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Metadatos de la página -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumno - Formulario de registro 4</title>
    </head>
    <body>
        <!-- Título principal -->
        <h1>Alumno - Formulario de registro 4</h1>
        <form action="Ex4.html" method="get">
            <!-- Bloque de datos personales -->
            <fieldset>
                <legend>Datos personales</legend>
                <!-- Campo para introducir el nombre -->
                <label for="nombre">Nombre:</label>
                <input type="text" name="name" id="name" maxlength="50" placeholder="Escriba su nombre">
                <br>
                <br>
                <!-- Campo para introducir los apellidos -->
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" maxlength="200" placeholder="Escriba sus apellidos">
                <br>
                <br>
                <!-- Campo para introducir el correo -->
                <label for="email">Correo:</label>
                <input type="text" name="email" id="email" maxlength="250" placeholder="usuario@empresa.com">
                <br>
                <br>
                <!-- Campo para introducir el usuario -->
                <label for="username">Usuario:</label>
                <input type="text" name="user" id="user" maxlength="5" placeholder="Introduce tu usuario">
                <br>
                <br>
                <!-- Campo para introducir la contraseña -->
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" maxlength="15" placeholder="Introduce tu contraseña">
                <br>
                <br>
                <!-- Opciones para seleccionar el sexo -->
                <label for="sexo">Sexo:</label>
                <input type="radio" id="hombre" name="sexo" value="hombre" checked>
                <label for="hombre">Hombre</label>
                <input type="radio" id="mujer" name="sexo" value="mujer">
                <label for="mujer">Mujer</label>
            </fieldset>
            <br>
            <br>
            <!-- Bloque de datos de contacto -->
            <fieldset>
                <legend>Datos de contacto</legend>
                <!-- Selección de la provincia -->
                <label for="provincia">Provincia:</label>
                <select name="provincia" id="provincia">
                    <option value="Alicante">Alicante</option>
                    <option value="Castellón">Castellón</option>
                    <option value="Valencia">Valencia</option>
                </select>
                <br>
                <br>
                <!-- Selección del horario -->
                <label for="horario">Horario de contacto:</label>
                <select id="horario" multiple size="3">
                    <option value="8-14">De 8 a 14 horas</option>
                    <option value="14-18">De 14 a 18 horas</option>
                    <option value="18-21">De 18 a 21 horas</option>
                </select>
                <br>
                <br>
                <!-- ¿Cómo nos ha conocido? -->
                <label for="conocido">¿Cómo nos ha conocido?:</label>
                <input type="checkbox" id="amigo" name="conocido" value="amigo">
                <label for="amigo">Un amigo</label>
                <input type="checkbox" id="web" name="conocido" value="web">
                <label for="web">Web</label>
                <input type="checkbox" id="prensa" name="conocido" value="prensa">
                <label for="prensa">Prensa</label>
                <input type="checkbox" id="otros" name="conocido" value="otros">
                <label for="otros">Otros</label>
            </fieldset>
            <br>
            <br>
            <!-- Bloque de datos de la incidencia -->
            <fieldset>
                <legend>Datos de la incidencia</legend>
                <!-- Selección del tipo de incidencia -->
                <label for="tipo_incidencia">Tipo de incidencia:</label>
                <select name="tipo_incidencia" id="tipo_incidencia">
                    <option value="Teléfono fijo">Teléfono fijo</option>
                    <option value="Teléfono móvil">Teléfono móvil</option>
                    <option value="Internet">Internet</option>
                    <option value="Televisión">Televisión</option>
                </select>
                <br>
                <br>
                <!-- Descripción de la incidencia -->
                <label for="descripcion">Descripción de la incidencia:</label>
                <textarea id="descripcion" name="descripcion" rows="4" cols="40" placeholder="Describe la incidencia"></textarea>
            </fieldset>
            <br>
            <br>

            <!-- Botones de enviar y resetear el formulario -->
            <fieldset>
                <input type="submit" value="Enviar">
                <input type="reset" value="Reset">
            </fieldset>

        </form>
    </body>
</html>
