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
    
        <form method="get" action="">
            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero" required>

            <label for="limite">Límite (1-10):</label>
            <input type="number" id="limite" name="limite" min="1" max="10" required>

            <input type="submit" name="enviar" value="Calcular"><br><br>
        </form>

        <?php
            if (isset($_GET['enviar'])) {
               $tabla = $_GET['numero'];
               $limite = $_GET['limite'];

               for ($i = 1; $i <= $limite; $i++) {
                   $resultado = $tabla * $i;
                   echo $tabla . " x " . $i . " = " . $resultado . "<br>";
               }
            }
        ?>
    </body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Media, Moda y Mediana</title>
</head>
<body>
    <h2>Calcular Media, Moda y Mediana</h2>
    <form action="" method="POST">
        <label for="numeros">Ingrese los números separados por coma:</label><br>
        <input type="text" id="numeros" name="numeros" placeholder="Ejemplo: 1, 2, 3, 4, 5"><br><br>
        
        <input type="checkbox" id="calcular_media" name="calcular_media" checked>
        <label for="calcular_media">Calcular Media</label><br>

        <input type="checkbox" id="calcular_moda" name="calcular_moda" checked>
        <label for="calcular_moda">Calcular Moda</label><br>

        <input type="checkbox" id="calcular_mediana" name="calcular_mediana" checked>
        <label for="calcular_mediana">Calcular Mediana</label><br><br>

        <input type="submit" value="Calcular">
    </form>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los números ingresados por el usuario
        $numeros = isset($_POST['numeros']) ? $_POST['numeros'] : '';
        $numeros = array_map('trim', explode(',', $numeros));  // Separar por coma y eliminar espacios

        if (!empty($numeros)) {
            // Asegurarnos de que todos los valores son números
            $numeros = array_filter($numeros, function($valor) {
                return is_numeric($valor);
            });

            if (!empty($numeros)) {
                // Calcular la media, la moda y la mediana según las selecciones del usuario
                $calcular_media = isset($_POST['calcular_media']);
                $calcular_moda = isset($_POST['calcular_moda']);
                $calcular_mediana = isset($_POST['calcular_mediana']);

                // Calcular y mostrar resultados
                if ($calcular_media) {
                    echo "<h3>Media: " . calcular_media($numeros) . "</h3>";
                }
                if ($calcular_moda) {
                    echo "<h3>Moda: " . calcular_moda($numeros) . "</h3>";
                }
                if ($calcular_mediana) {
                    echo "<h3>Mediana: " . calcular_mediana($numeros) . "</h3>";
                }
            } else {
                echo "<h3>Por favor, ingrese solo números válidos.</h3>";
            }
        } else {
            echo "<h3>Por favor, ingrese números para calcular.</h3>";
        }
    }

    // Función para calcular la media
    function calcular_media($numeros) {
        $suma = array_sum($numeros);
        return $suma / count($numeros);
    }

    // Función para calcular la moda
    function calcular_moda($numeros) {
        $valores = array_count_values($numeros);
        arsort($valores);
        $max_cuenta = reset($valores);
        $modas = array_keys($valores, $max_cuenta);

        return implode(", ", $modas);
    }

    // Función para calcular la mediana
    function calcular_mediana($numeros) {
        sort($numeros);
        $cantidad = count($numeros);
        
        if ($cantidad % 2 == 0) {
            $medio1 = $numeros[$cantidad / 2 - 1];
            $medio2 = $numeros[$cantidad / 2];
            return ($medio1 + $medio2) / 2;
        } else {
            return $numeros[floor($cantidad / 2)];
        }
    }
    ?>
</body>
</html>


