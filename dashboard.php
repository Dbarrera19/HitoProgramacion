<?php
session_start(); // Inicia la sesión
require 'config.php'; // Conexión a la base de datos

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al login si no ha iniciado sesión
    exit();
}

$id_usuario = $_SESSION['id_usuario']; // Obtiene el ID del usuario

// Obtener las tareas del usuario desde la base de datos
$stmt = $conn->prepare("SELECT id, descripcion, completada FROM tareas WHERE id_usuario = ?");
$stmt->execute([$id_usuario]);
$tareas = $stmt->fetchAll(PDO::FETCH_ASSOC); // Guarda los resultados en un array
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a la hoja de estilos -->
</head>
<body>
    <div class="container">
        <h1>Gestor de Tareas</h1>
        <a href="logout.php" class="btn">Cerrar Sesión</a> <!-- Botón para cerrar sesión -->

        <h2>Tus Tareas</h2>

        <!-- Formulario para agregar una nueva tarea -->
        <form action="agregar_tarea.php" method="POST">
            <input type="text" name="descripcion" required placeholder="Nueva tarea">
            <button type="submit" class="btn">Agregar</button>
        </form>

        <!-- Lista de tareas -->
        <ul>
            <?php foreach ($tareas as $tarea): ?> 
                <li class="tarea">
                    <span class="tarea-nombre">
                        <?php 
                        // Muestra la descripción de la tarea o un mensaje si está vacía
                        if (!empty($tarea['descripcion'])) {
                            echo htmlspecialchars($tarea['descripcion']); 
                        } else {
                            echo "Tarea sin descripción";
                        }
                        ?>
                    </span>

                    <div class="botones">
                        <!-- Botón para marcar la tarea como completada -->
                        <?php if (isset($tarea['completada']) && $tarea['completada'] == 0): ?>
                            <a href="completar_tarea.php?id=<?php echo $tarea['id']; ?>" class="btn">✅</a>
                        <?php else: ?>
                            <span class="completada">✔ Completada</span>
                        <?php endif; ?>

                        <!-- Botón para eliminar la tarea -->
                        <a href="eliminar_tarea.php?id=<?php echo $tarea['id']; ?>" class="btn btn-danger">❌</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
