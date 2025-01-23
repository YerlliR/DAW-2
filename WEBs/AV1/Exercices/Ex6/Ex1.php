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
    <title>Formulario de Saludo</title>
</head>
<body>
    <form method="post" action="">
        <label for="name">Tu Nombre:</label>
        <br>
        <input type="text" name="name" id="name" placeholder="Nombre" required>
        <br>
        <br>
        <label for="saludo">¿Qué quieres recibir?</label>
        <br>
        <input type="radio" name="saludo" id="saludo1" value="saludo" required> Saludo
        <br>
        <input type="radio" name="saludo" id="saludo2" value="despedida" required> Despedida
        <br>
        <br>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $saludo = $_POST['saludo'];

        $informacion = ['name' => $name, 'saludo' => $saludo];
        setcookie('saludo', json_encode($informacion), time() + 60 * 60 * 24, "/");

        if ($saludo == 'saludo') {
            echo "<p>Hola, {$name}.</p>";
        } else {
            echo "<p>Adiós, {$name}.</p>";
        }
    }

    if (isset($_COOKIE['saludo'])) {
        $informacion = json_decode($_COOKIE['saludo'], true);
        $name = $informacion['name'];
        $saludo = $informacion['saludo'];

        if ($saludo == 'saludo') {
            echo "<p>Hola de nuevo, {$name}.</p>";
        } else {
            echo "<p>Adiós, {$name}.</p>";
        }
    }
    ?>
    