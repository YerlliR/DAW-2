<?php
/**
 * @author Sergio Ricart Alabau
 */

// Iniciar la sesión para poder usar cookies
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Preferencias</title>
</head>
<body>
    <div class="container">
        <h1>Formulario de Preferencias</h1>
        <form method="post" action="">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" placeholder="Tu nombre" required>

            <label for="idioma">Idioma preferido:</label>
            <select name="idioma" id="idioma" required>
                <option value="español">Español</option>
                <option value="inglés">Inglés</option>
                <option value="francés">Francés</option>
            </select>

            <label for="color">Color favorito:</label>
            <input type="color" name="color" id="color" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" id="ciudad" placeholder="Tu ciudad" required>

            <input type="submit" name="submit" value="Guardar Preferencias">
        </form>

        <?php
        // Procesar el formulario cuando se envía
        if (isset($_POST['submit'])) {
            // Sanitizar y validar las entradas
            $name = htmlspecialchars($_POST['name']);
            $idioma = htmlspecialchars($_POST['idioma']);
            $color = htmlspecialchars($_POST['color']);
            $ciudad = htmlspecialchars($_POST['ciudad']);

            // Crear un array con los datos
            $preferencias = [
                'name' => $name,
                'idioma' => $idioma,
                'color' => $color,
                'ciudad' => $ciudad
            ];

            // Guardar los datos en una cookie (expira en 7 días)
            setcookie('preferencias', json_encode($preferencias), time() + (86400 * 7), "/");

            // Mostrar los datos actuales
            echo "<div class='message'>";
            echo "<h2>Datos Actuales:</h2>";
            echo "<p><strong>Nombre:</strong> {$name}</p>";
            echo "<p><strong>Idioma:</strong> {$idioma}</p>";
            echo "<p><strong>Color favorito:</strong> <span style='color: {$color};'>■</span> {$color}</p>";
            echo "<p><strong>Ciudad:</strong> {$ciudad}</p>";
            echo "</div>";
        }

        // Mostrar los datos almacenados en la cookie (si existen)
        if (isset($_COOKIE['preferencias'])) {
            $preferencias = json_decode($_COOKIE['preferencias'], true);

            echo "<div class='message'>";
            echo "<h2>Datos Almacenados en la Cookie:</h2>";
            echo "<p><strong>Nombre:</strong> {$preferencias['name']}</p>";
            echo "<p><strong>Idioma:</strong> {$preferencias['idioma']}</p>";
            echo "<p><strong>Color favorito:</strong> <span style='color: {$preferencias['color']};'>■</span> {$preferencias['color']}</p>";
            echo "<p><strong>Ciudad:</strong> {$preferencias['ciudad']}</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>