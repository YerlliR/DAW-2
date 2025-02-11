<?php
session_start();

// Regenerar el SID
session_regenerate_id(true);

// Generar un nuevo token
$_SESSION['form_token'] = bin2hex(random_bytes(32));

// Redirigir de vuelta al formulario
header("Location: formulario.html");
exit();
?>