<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Define el conjunto de caracteres para la página -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Asegura que la página sea responsive -->
    <title>Registro</title> <!-- Título de la página -->
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a la hoja de estilos -->
</head>
<body>
    <div class="container"> <!-- Contenedor principal de la página -->
        <h2>Registro de Usuario</h2> <!-- Título de la sección -->

        <!-- Formulario de registro -->
        <form action="procesar_registro.php" method="POST">
            <!-- Campo para el nombre de usuario -->
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>

            <!-- Campo para el correo electrónico -->
            <input type="email" name="email" placeholder="Correo electrónico" required>

            <!-- Campo para la contraseña -->
            <input type="password" name="password" placeholder="Contraseña" required>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn">Registrarse</button>
        </form>

        <!-- Enlace para volver a la página principal -->
        <a href="index.php" class="btn-back">Volver al inicio</a>
    </div>
</body>
</html>
