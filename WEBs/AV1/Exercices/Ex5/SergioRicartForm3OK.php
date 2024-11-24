<?php
/**
 * @author Sergio Ricart Alabau
 */
?>


<?php
            if (isset($_POST['enviar'])) {
                $data = $_POST;

                echo "<h2>Datos recibidos:</h2>";
                echo "<i>Nombre:</i> " . "<b>" . $data['name'] . "</b>" . "<br>";
                echo "<i>Apellidos:</i> " . "<b>" . $data['apellidos'] . "</b>" . "<br>";
                echo "<i>Correo:</i> " . "<b>" . $data['email'] . "</b>" . "<br>";
                echo "<i>Usuario:</i> " . "<b>" . $data['user'] . "</b>" . "<br>";
                echo "<i>Contraseña:</i> " . "<b>" . $data['password'] . "</b>" . "<br>";
                echo "<i>Sexo:</i> " . "<b>" . $data['sexo'] . "</b>" . "<br>";
                echo "<i>Provincia:</i> " . "<b>" . $data['provincia'] . "</b>" . "<br>";

                if (isset($data['horario'])) {
                    echo "<i>Horario de contacto:</i> " . "<b>" . implode(" - ", $data['horario']) . "</b>" . "<br>";
                } else {
                    echo "<i>Horario de contacto:</i> No seleccionado<br>";
                }

                if (isset($data['conocido'])) {
                    echo "<i>¿Cómo nos ha conocido?:</i> " . "<b>" . implode(" - ", $data['conocido']) . "</b>" . "<br>";
                } else {
                    echo "<i>¿Cómo nos ha conocido?:</i> No especificado<br>";
                }

                echo "<i>Comentarios:</i> " . "<b>" . $data['comentarios'] . "</b>" . "<br>";

                if ($data['novedades'] == "on") {
                    echo "<b>Ha seleccionado recibir ofertas</b><br>";
                } else {
                    echo "<b>No ha seleccionado recibir ofertas</b><br>";
                }

                if ($data['aceptacion'] == "on") {
                    echo "<b>Declara haber leído y aceptado las condiciones generales del programa y la normativa sobre protección de datos</b><br>";
                } else {
                    echo "<b>No declara haber leído y aceptado las condiciones generales del programa y la normativa sobre protección de datos</b><br>";
                }

            }
        ?>