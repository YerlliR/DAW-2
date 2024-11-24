<?php
/**
 * @author Sergio Ricart Alabau
 */
?>




<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Metadatos de la página -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sergio Ricart Alabau - Formulario de registro</title>
    </head>
    <body>
        <!-- Título principal -->
        <h1>Sergio Ricart Alabau - Formulario de registro 2</h1>
        <form action="./SergioRicartForm2OK.php" method="post">
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
            <!-- Campo para introducir el correo -->
            <label for="email">Correo:</label>
            <input type="text" name="email" id="email" maxlength="250">
            <br>
            <br>
            <!-- Campo para introducir el usuario -->
            <label for="username">Usuario:</label>
            <input type="text" name="user" id="user" maxlength="5">
            <br>
            <br>
            <!-- Campo para introducir la contraseña -->
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" maxlength="15">
            <br>
            <br>
            <!-- Opciones para seleccionar el sexo -->
            <label for="sexo">Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="hombre">
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer">
            <label for="mujer">Mujer</label>
            <br>
            <br>
            <!-- Selección de la provincia -->
            <label for="provincia">Provincia:</label>
            <select name="provincia" id="provincia">
                <option value="Alicante">Alicante</option>
                <option value="Castellón">Castellón</option>
                <option value="Valencia">Valencia</option>
            </select>
            <br>
            <br>
            <!-- Selección del estado -->
            <label  for="estado">Selecciona tu estado:</label>
            <select name="estado[]" id="estado" multiple size="2">
                <option value="estudiando">Estudiando</option>
                <option value="trabajando">Trabajando</option>
                <option value="buscando_empleo">Buscando empleo</option>
                <option value="otro">Otro</option>
            </select>
            <br>
            <br>
            <!-- Campo para introducir comentarios -->
            <label for="comentarios">Comentarios:</label>
            <br>
            <textarea id="comentarios" name="comentarios" rows="6" cols="60"></textarea>
            <br>
            <br>
            <!-- Opción para recibir información sobre novedades y ofertas -->
            <input type="checkbox" id="novedades" name="novedades" checked>
            <label for="novedades">Deseo recibir información sobre novedades y ofertas</label>
            <br>
            <br>
            <!-- Aceptación de condiciones generales -->
            <input type="checkbox" id="aceptacion" name="aceptacion">
            <label for="aceptacion">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label>
            <br>
            <br>
            <!-- Botones de enviar y resetear el formulario -->
            <input type="submit" value="Enviar" name="enviar" id="enviar">
            <input type="reset" value="Reset">
        </form>

        
    </body>
</html>


