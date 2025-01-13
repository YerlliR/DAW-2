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
        <form action="">
            <label for="name">Tu Nombre:</label>
            <br>
            <input type="text" name="name" id="name" placeholder="Nombre">
            <br>
            <br>
            <label for="saludo">Que quieres recibir ?</label>
            <br>
            <input type="radio" name="saludo" id="saludo1" value="saludo"> Saludo
            <br>
            <input type="radio" name="saludo" id="saludo2" value="despedida"> Despedida
            <br>
            <br>
            <input type="submit" name="submit" id="submit">

        </form>
    </body>
</html>