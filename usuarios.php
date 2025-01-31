<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "curso", "hito1");

if ($conexion->connect_error) {
    // Si hay un error en la conexión, se muestra un mensaje y se detiene la ejecución
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener todos los usuarios
$consulta = "SELECT * FROM usuarios";
$resultado = $conexion->query($consulta);

$usuarios = []; // Se crea un array vacío para almacenar los usuarios obtenidos

if ($resultado->num_rows > 0) {
    // Si hay usuarios en la base de datos, se recorren y almacenan en el array
    while($usuario = $resultado->fetch_assoc()) {
        $usuarios[] = $usuario;
    }
} else {
    // Si no hay usuarios, se muestra un mensaje
    echo "No se encontraron usuarios.";
}

// Se cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Se enlaza una hoja de estilos CSS -->
</head>
<body>
    <div class="container">
        <h2>Usuarios Registrados</h2>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Plan Base</th>
                    <th>Paquete</th>
                    <th>Duración</th>
                    <th>Acciones</th> <!-- Sección de acciones como modificar o eliminar -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?> <!-- Se recorre la lista de usuarios obtenida de la BD -->
                    <tr>
                        <td><?= $usuario['nombre']; ?></td>
                        <td><?= $usuario['correo']; ?></td>
                        <td><?= $usuario['edad']; ?></td>
                        <td><?= $usuario['plan_base']; ?></td>
                        <td><?= $usuario['paquete']; ?></td>
                        <td><?= $usuario['duracion']; ?> meses</td>

                        <td class="table-actions">
                            <!-- Enlaces para modificar o eliminar un usuario -->
                            <a href="modificar.php?id=<?= $usuario['id']; ?>"><button>Modificar</button></a>
                            <a href="eliminar.php?id=<?= $usuario['id']; ?>"><button>Eliminar</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Botón para volver a la página de registro -->
        <br>
        <button onclick="window.location.href='../index.php'">Volver a Registro</button>
    </div>
</body>
</html>
