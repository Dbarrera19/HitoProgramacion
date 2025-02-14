<?php
session_start(); // Inicia la sesión

require 'config.php'; // Conexión a la base de datos

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al login si no ha iniciado sesión
    exit();
}

// Verifica si el formulario se envió con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['descripcion'])) { // Verifica que la descripción no esté vacía
        $descripcion = trim($_POST['descripcion']); // Elimina espacios en blanco

        if ($descripcion === "") { // Verifica si sigue vacía después de eliminar espacios
            $_SESSION['error'] = "La descripción de la tarea no puede estar vacía.";
            header("Location: dashboard.php"); // Redirige al dashboard con un error
            exit();
        }

        $id_usuario = $_SESSION['id_usuario']; // Obtiene el ID del usuario

        // Prepara la consulta para insertar la tarea en la base de datos
        $stmt = $conn->prepare("INSERT INTO tareas (descripcion, id_usuario, completada) VALUES (?, ?, 0)");
        $stmt->execute([$descripcion, $id_usuario]); // Ejecuta la consulta con los valores

        header("Location: dashboard.php"); // Redirige al dashboard después de agregar la tarea
        exit();
    } else {
        $_SESSION['error'] = "Debes escribir una tarea."; // Guarda el mensaje de error
        header("Location: dashboard.php"); // Redirige al dashboard con error
        exit();
    }
}
?>
