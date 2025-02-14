<?php
session_start(); // Inicia la sesión para poder manipularla
session_destroy(); // Destruye la sesión actual, cerrando la sesión del usuario
header("Location: index.php"); // Redirige al usuario a la página principal (index.php)
exit(); // Asegura que no se siga ejecutando el código después de la redirección
?>
