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
            <label for="llamada1">Duraci n llamada 1 (minutos):</label>
            <input type="number" name="llamada1" id="llamada1">
            <br><br>
            <label for="llamada2">Duraci n llamada 2 (minutos):</label>
            <input type="number" name="llamada2" id="llamada2">
            <br><br>
            <label for="llamada3">Duraci n llamada 3 (minutos):</label>
            <input type="number" name="llamada3" id="llamada3">
            <br><br>
            <label for="llamada4">Duraci n llamada 4 (minutos):</label>
            <input type="number" name="llamada4" id="llamada4">
            <br><br>
            <label for="llamada5">Duraci n llamada 5 (minutos):</label>
            <input type="number" name="llamada5" id="llamada5">
            <br><br>
            <input type="submit" value="Calcular" id="enviar" name="enviar">
        </form>
        <?php
            if (isset($_GET['enviar'])) {
                $llamadas = [$_GET['llamada1'],$_GET['llamada2'],$_GET['llamada3'],$_GET['llamada4'],$_GET['llamada5']];
                $total = 0;
                foreach ($llamadas as $llamada) {
                    if ($llamada >= 3) {
                        $total += (10 + ($llamada - 3) * 5);
                    } else {
                        $total += 10;
                    }
                }
                echo "El total a pagar es de $total centimos";
            }

        ?>
    </body>
</html>