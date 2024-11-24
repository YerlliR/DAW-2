<?php
/**
 * @author Sergio Ricart Alabau
 */
?>


<?php
    if (isset($_POST['enviar'])) {
        $data = $_POST;

        // Mostrar datos recibidos
        echo "<h2>Datos recibidos:</h2>";
        echo "<i>Nombre:</i> " . "<b>" . $data['name'] . "</b>" . "<br>";
        echo "<i>Apellidos:</i> " . "<b>" . $data['apellidos'] . "</b>" . "<br>";
        echo "<i>Correo:</i> " . "<b>" . $data['email'] . "</b>" . "<br>";
        echo "<i>Usuario:</i> " . "<b>" . $data['user'] . "</b>" . "<br>";
        echo "<i>Contraseña:</i> " . "<b>" . $data['password'] . "</b>" . "<br>";
        echo "<i>Sexo:</i> " . "<b>" . $data['sexo'] . "</b>" . "<br>";
        echo "<i>Provincia:</i> " . "<b>" . $data['provincia'] . "</b>" . "<br>";

        // Mostrar horarios seleccionados
        echo "<i>Horario de contacto:</i> " . "<b>" . implode(" - ", $data['horario']) . "</b>" . "<br>";

        // Mostrar cómo nos ha conocido
        echo "<i>¿Cómo nos ha conocido?:</i> " . "<b>" . (isset($data['conocido']) ? implode(" - ", $data['conocido']) : 'NO ESPECIFICADO') . "</b>" . "<br>";

        echo "<i>Tipo de incidencia:</i> " . "<b>" . $data['tipo_incidencia'] . "</b>" . "<br>";
        echo "<i>Descripción de la incidencia:</i> " . "<b>" . $data['descripcion'] . "</b>" . "<br>";
    }
    ?>