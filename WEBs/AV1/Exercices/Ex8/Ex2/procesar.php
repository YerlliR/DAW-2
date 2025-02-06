<?php
session_start();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$asignatura = $_POST['asignatura'];
$grupo = $_POST['grupo'];
$edad = $_POST['edad'];
$cargo = $_POST['cargo'];

$_SESSION['nombre'] = $nombre;
$_SESSION['apellido'] = $apellido;
$_SESSION['asignatura'] = $asignatura;
$_SESSION['grupo'] = $grupo;

if ($edad == 'mayor' && $cargo == 'con_cargo') {
    header('Location: profesor.php');
} elseif ($edad == 'mayor' && $cargo == 'sin_cargo') {
    header('Location: director.php');
} elseif ($edad == 'menor' && $cargo == 'con_cargo') {
    header('Location: estudiante.php');
} else {
    header('Location: delegado.php');
}
exit();
?>