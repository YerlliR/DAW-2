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
            <label for="fechaInicio">Fecha de inicio</label>
            <input type="datetime-local" name="fechaInicio" id="fechaInicio"><br><br>
            <label for="fechaFin">Fecha final</label>
            <input type="datetime-local" name="fechaFin" id="fechaFin"><br><br>
            <input type="submit" name="enviar" value="Calcular"><br><br>
            <?php
                if (isset($_GET['enviar'])) {
                    $fechaInicio = $_GET['fechaInicio'];
                    $fechaFin = $_GET['fechaFin'];

                    $diferencia = (strtotime($fechaFin) - strtotime($fechaInicio));

                    $dias = floor($diferencia / 86400);
                    $horas = floor(($diferencia % 86400) / 3600);
                    $minutos = floor(($diferencia % 3600) / 60);

                    echo "Hay $dias dias, $horas horas y $minutos minutos de diferencia entre las fechas seleccionadas";
                }
                ?>
    </body>
</html>