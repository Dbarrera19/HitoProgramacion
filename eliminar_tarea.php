<?php
session_start(); // Inicia la sesión
require 'config.php'; // Incluye la conexión a la base de datos

// Verifica que el usuario haya iniciado sesión y que se haya recibido un ID de tarea
if (!isset($_SESSION['usuario']) || !isset($_GET['id'])) {
    header("Location: login.php"); // Redirige al login si no hay sesión o no hay ID
    exit();
}

$id_usuario = $_SESSION['id_usuario']; // Obtiene el ID del usuario
$id_tarea = $_GET['id']; // Obtiene el ID de la tarea a eliminar

// Elimina la tarea solo si pertenece al usuario autenticado
$stmt = $conn->prepare("DELETE FROM tareas WHERE id = ? AND id_usuario = ?");
$stmt->execute([$id_tarea, $id_usuario]);

header("Location: dashboard.php"); // Redirige al dashboard después de eliminar
exit();
?>
