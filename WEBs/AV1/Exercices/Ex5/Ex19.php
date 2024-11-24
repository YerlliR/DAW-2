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
    <title>Generar Horario</title>
</head>
<body>
    <h1>Generar Horario</h1>
    <form method="post" action="">
        <h2>Selecciona el curso:</h2>
        <label><input type="radio" name="curso" value="Curso 1" required> Curso 1</label>
        <label><input type="radio" name="curso" value="Curso 2"> Curso 2</label>
        <label><input type="radio" name="curso" value="Curso 3"> Curso 3</label>

        <h2>Selecciona el módulo:</h2>
        <select name="modulo" required>
            <option value="">--Selecciona un módulo--</option>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Historia">Historia</option>
            <option value="Ciencias">Ciencias</option>
            <option value="Inglés">Inglés</option>
        </select>

        <h2>Selecciona las horas:</h2>
        <label><input type="checkbox" name="horas[]" value="08:00 - 10:00"> 08:00 - 10:00</label><br>
        <label><input type="checkbox" name="horas[]" value="10:00 - 12:00"> 10:00 - 12:00</label><br>
        <label><input type="checkbox" name="horas[]" value="12:00 - 14:00"> 12:00 - 14:00</label><br>
        <label><input type="checkbox" name="horas[]" value="14:00 - 16:00"> 14:00 - 16:00</label><br>
        <label><input type="checkbox" name="horas[]" value="16:00 - 18:00"> 16:00 - 18:00</label><br>

        <br>
        <button type="submit">Generar Horario</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los datos del formulario
        $curso = $_POST['curso'];
        $modulo = $_POST['modulo'];
        $horas = isset($_POST['horas']) ? $_POST['horas'] : [];

        // Validar que se seleccionaron horas
        if (empty($horas)) {
            echo "<p style='color: red;'>Por favor selecciona al menos una franja horaria.</p>";
        } else {
            echo "<h2>Horario Generado</h2>";
            echo "<table>";
            echo "<tr><th>Curso</th><th>Módulo</th><th>Hora</th></tr>";
            foreach ($horas as $hora) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($curso) . "</td>";
                echo "<td>" . htmlspecialchars($modulo) . "</td>";
                echo "<td>" . htmlspecialchars($hora) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>
