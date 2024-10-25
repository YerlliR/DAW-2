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
            <input type="date" name="date" id="date" >
            <br><br>
            <input type="submit" name="enviar" id="enviar">
        </form>
        <?php
            if (isset($_GET['enviar'])) {
                $date = $_GET['date'];
                $day = date("d", strtotime($date));
                if ($day >= 15) {
                    echo "Segunda quincena";
                } else {
                    echo "Primera quincena";
                }
            }
        ?>
    </body>
</html>