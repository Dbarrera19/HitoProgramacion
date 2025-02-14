<?php
session_start(); // Inicia la sesión

require 'config.php'; // Conexión a la base de datos

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al login si no ha iniciado sesión
    exit();
}

// Verifica si se recibió un ID de tarea por la URL
if (isset($_GET['id'])) {
    $id_tarea = $_GET['id']; // Obtiene el ID de la tarea

    // Marca la tarea como completada en la base de datos
    $stmt = $conn->prepare("UPDATE tareas SET completada = 1 WHERE id = ?");
    $stmt->execute([$id_tarea]); // Ejecuta la consulta con el ID de la tarea
}

// Redirige de vuelta al dashboard
header("Location: dashboard.php");
exit();
?>
