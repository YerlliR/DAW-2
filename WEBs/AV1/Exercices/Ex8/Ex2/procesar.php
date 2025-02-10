<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellido'] = $_POST['apellido'];
    $_SESSION['asignatura'] = $_POST['asignatura'];
    $_SESSION['grupo'] = $_POST['grupo'];
    $_SESSION['edad'] = $_POST['edad'];
    $_SESSION['cargo'] = $_POST['cargo'];
    $edad = $_POST['edad'];
    $cargo = $_POST['cargo'];


    if ($edad == "mayor" && $cargo == "cargo") {
        $perfil = "director";
    } elseif ($edad == "mayor" && $cargo == "NoCargo") {
        $perfil = "profesor";
    } elseif ($edad == "menor" && $cargo == "cargo") {
        $perfil = "delegado";
    } elseif ($edad == "menor" && $cargo == "NoCargo") {
        $perfil = "estudiante";
    } else {
        $perfil = "invalido";
    }

    $_SESSION["perfil"] = $perfil;

    switch ($perfil) {
        case 'delegado':
            header("Location: delegado.php");
            break;
        case 'estudiante':
            header("Location: estudiante.php");
            break;
        case 'profesor':
            header("Location: profesor.php");
            break;
        case 'director':
            header("Location: director.php");
            break;
        default:
            echo "Perfil no válido.";
            break;
    }
    exit();
}
?>