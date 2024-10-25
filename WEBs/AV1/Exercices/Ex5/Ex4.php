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
            <label for="name">Horas de trabajo</label>
            <input type="number" id="name" name="horas">
            <br><br>
            <input type="submit" name="enviar" id="enviar" value="Calcular">
        </form>
        <?php
            if (isset($_GET['enviar'])) {
                $horas = $_GET['horas'];
                for ($i = 0; $i < $horas; $i++) {
                    if ($i <= 40) {
                        $sueldo = 12 + $sueldo;
                    }elseif ($i > 40) {
                        $sueldo = 16 + $sueldo;
                    }else {
                        echo "Error";
                    }
                }
                echo "El sueldo es: $sueldo €";
            }
        ?>
    </body>
</html>