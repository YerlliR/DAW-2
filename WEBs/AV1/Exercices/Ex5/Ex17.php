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
    <title>Traductor</title>
</head>
<body>
    <form method="post">
        <table border="1">
            <tr>
                <th>Palabra en Inglés</th>
                <th>Seleccionar</th>
                <th>Traducción al Castellano</th>
            </tr>
            <?php
                $diccionario = [
                    "hello" => "hola",
                    "world" => "mundo",
                    "cat" => "gato",
                    "dog" => "perro",
                    "car" => "coche",
                    "house" => "casa",
                    "book" => "libro",
                    "computer" => "ordenador",
                    "phone" => "teléfono",
                    "table" => "mesa"
                ];

                foreach ($diccionario as $ingles => $espanol) {
                    echo "<tr>";
                    echo "<td>$ingles</td>";
                    echo "<td><input type='checkbox' name='palabras[]' value='$ingles'></td>";
                    echo "<td>" . (isset($_POST['traducir']) && in_array($ingles, $_POST['palabras']) ? $espanol : "") . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <input type="submit" name="traducir" value="Traducir">
    </form>
</body>
</html>