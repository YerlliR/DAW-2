<?php
/**
 * @author Sergio Ricart Alabau
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="get">
            <input type="number" name="numero1" id="numero1">
            <select name="opcion" id="">
                <option value="APeseta">De Euro A Pesetas</option>
                <option value="AEuro">De Pesetas A Euro</option>
            </select>
            <br><br>
            <input type="submit" value="Calcular" id="enviar" name="enviar">
        </form>
        <?php
            if (isset($_GET['enviar'])) {
                $numero1 = $_GET['numero1'];
                $opcion = $_GET['opcion'];
                if ($opcion == 'APeseta') {
                    $conversion = $numero1 * 166.386;
                    echo "$numero1 € son $conversion ₧";
                } else {
                    $conversion = $numero1 / 166.386;
                    echo "$numero1 £ son $conversion €";
                }
            }
        ?>
    </body>
</html>