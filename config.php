<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Servidor de la base de datos
$dbname = "gestor_tareas"; // Nombre de la base de datos
$username = "root"; // Usuario de la base de datos
$password = "curso"; // Contraseña de la base de datos

try {
    // Crear conexión usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configurar PDO para mostrar errores si hay problemas en la consulta
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error, mostrar mensaje y detener el script
    die("Error de conexión: " . $e->getMessage());
}
?>
