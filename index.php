<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Hito Daniel Streamweb</title> 
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>

    <h2>Registro de Usuario</h2> 
    <form id="registroForm" action="php/procesar.php" method="POST">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required> 
        <input type="email" name="correo" id="correo" placeholder="Correo" required> 
        <input type="number" name="edad" id="edad" placeholder="Edad" required> 

        <label>Plan Base:</label>
        <select name="plan_base" id="plan_base">
            <option value="Basico">Básico</option>
            <option value="Estandar">Estándar</option>
            <option value="Premium">Premium</option>
        </select>

        <label>Paquete Adicional:</label>
        <select name="paquete" id="paquete"> s
            <option value="Ninguno">Ninguno</option>
            <option value="Deporte">Deporte</option>
            <option value="Cine">Cine</option>
            <option value="Infantil">Infantil</option>
        </select>

        <label>Duración:</label>
        <select name="duracion" id="duracion"> 
            <option value="Mensual">Mensual</option>
            <option value="Anual">Anual</option>
        </select>

        <button type="submit">Registrar</button> 
    </form>

    <br>
    <button onclick="window.location.href='php/usuarios.php'">Ver Usuarios Registrados</button> <!-- Botón para ver usuarios registrados -->

    <script src="script.js"></script> <!-- Enlace al script JS -->

</body>
</html>

