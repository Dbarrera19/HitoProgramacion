<?php
$conexion = new mysqli("localhost", "root", "curso", "hito1");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar usuario
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: usuarios.php");  // Redirige a la lista de usuarios
        exit();
    } else {
        echo "Error al eliminar usuario: " . $conexion->error;
    }
}

$conexion->close();
?>
