<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $query->execute([$email]);
    
    if ($query->fetch()) {
        echo "El correo ya está registrado. <a href='registro.php'>Intentar de nuevo</a>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$usuario, $email, $password])) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error en el registro.";
    }
}
?>
