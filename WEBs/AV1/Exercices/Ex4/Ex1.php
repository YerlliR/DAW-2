<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sergio Ricart Alabau - Formulario de registro</title>
    </head>
    <body>
        <h1>Sergio Ricart Alabau - Formulario de registro</h1>
        <form action="Ex1.php" method="get">
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
            <input type="checkbox" id="novedades" name="novedades">
            <label for="novedades">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label>
            <br>
            <br>
            <!-- Botón para enviar el formulario -->
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>

