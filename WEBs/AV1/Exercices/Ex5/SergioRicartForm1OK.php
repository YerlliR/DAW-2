<?php
/**
 * @author Sergio Ricart Alabau
 */
?>



<?php
            if (isset($_GET['enviar'])) {
                $data = $_GET;
            
                echo "<i>Nombre:</i> " . "<b>". $data['name'] ."</b>" . "<br>";
                echo "<i>Apellidos:</i> " . "<b>". $data['apellidos'] ."</b>" . "<br>";
                echo "<i>Sexo:</i> " . "<b>". $data['sexo'] ."</b>" . "<br>";
                echo "<i>Correo:</i> " . "<b>". $data['email'] ."</b>" . "<br>";
                echo "<i>Provincia:</i> " . "<b>". $data['provincia'] ."</b>" . "<br>";

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