<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a la hoja de estilos -->
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>

        <!-- Formulario para iniciar sesión -->
        <form action="procesar_login.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required> <!-- Campo para el correo -->
            <input type="password" name="password" placeholder="Contraseña" required> <!-- Campo para la contraseña -->
            <button type="submit" class="btn">Iniciar Sesión</button> <!-- Botón para enviar el formulario -->
        </form>

        <!-- Enlace para volver a la página de inicio -->
        <a href="index.php" class="btn-back">Volver al inicio</a>
    </div>
</body>
</html>
