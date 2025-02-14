<?php
session_start(); // Inicia la sesión para poder guardar los datos del usuario
require 'config.php'; // Conexión a la base de datos

// Verifica si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los valores del correo y la contraseña desde el formulario
    $email = trim($_POST['email']); // Elimina espacios innecesarios
    $password = trim($_POST['password']); // Elimina espacios innecesarios

    // Consulta la base de datos buscando el usuario por el correo electrónico
    $stmt = $conn->prepare("SELECT id, usuario, password FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene los datos del usuario si existe

    // Verifica si el usuario existe y si la contraseña es correcta usando password_verify
    if ($usuario && password_verify($password, $usuario['password'])) {
        // Guarda los datos del usuario en la sesión
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['id_usuario'] = $usuario['id'];
        // Redirige al usuario al dashboard
        header("Location: dashboard.php"); // ✅ Redirigir solo después del login
        exit(); // Asegura que no se ejecute más código
    } else {
        // Si las credenciales son incorrectas, muestra un mensaje de error y un enlace para volver a intentar
        echo "Credenciales incorrectas. <a href='login.php'>Intentar de nuevo</a>";
    }
}
?>
