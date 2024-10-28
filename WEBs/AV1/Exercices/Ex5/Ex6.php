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
        <form action="" method="get">
            <label for="hora">Introduce la hora en formato (hh:mm:ss)</label><br>
            <input type="text" name="hora" id="hora"><br><br>
            <input type="submit" name="enviar" id="enviar"><br>
        </form>
        <?php
            if (isset($_GET['enviar'])) {
                $hora = $_GET['hora'];
                $hora = explode(":", $hora);
                if ($hora[0]>=0 && $hora[0]<=23 && $hora[1]>=0 && $hora[1]<=59 && $hora[2]>=0 && $hora[2]<=59) {
                    echo "La hora introducida es correcta.\n";
                } else {
                    echo "La hora introducida no es correcta.\n";
                }
                
            }
        ?>
    </body> 
</html>