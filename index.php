<?php
session_start(); // Inicia la sesión

// Si el usuario ya ha iniciado sesión, lo redirige al dashboard
if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a la hoja de estilos -->
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Gestor de Tareas</h1>
        <p>Por favor, inicia sesión o regístrate para comenzar.</p>

        <!-- Botones para ir a las páginas de inicio de sesión y registro -->
        <a href="login.php" class="btn">Iniciar Sesión</a>
        <a href="registro.php" class="btn">Registrarse</a>
    </div>
</body>
</html>
