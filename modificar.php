<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "curso", "hito1");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se envió el formulario de modificación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $correo = $conexion->real_escape_string($_POST["correo"]);
    $edad = (int) $_POST["edad"];
    $plan_base = $conexion->real_escape_string($_POST["plan_base"]);
    $paquete = $conexion->real_escape_string($_POST["paquete"]);
    $duracion = $conexion->real_escape_string($_POST["duracion"]);

    // Validaciones de datos
    if (empty($nombre) || empty($correo) || empty($edad) || empty($plan_base) || empty($paquete) || empty($duracion)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Cálculo del costo mensual
    $costo = 0;
    switch ($plan_base) {
        case 'Basico':
            $costo = 5;
            break;
        case 'Estandar':
            $costo = 10;
            break;
        case 'Premium':
            $costo = 15;
            break;
    }

    if ($paquete != 'Ninguno') {
        switch ($paquete) {
            case 'Deporte':
                $costo += 3;
                break;
            case 'Cine':
                $costo += 4;
                break;
            case 'Infantil':
                $costo += 2;
                break;
        }
    }

    if ($duracion == 'Anual') {
        $costo *= 12;  // Se multiplica por 12 si es anual
    }

    // Actualizar el usuario en la base de datos
    $sql = "UPDATE usuarios SET 
                nombre='$nombre', 
                correo='$correo', 
                edad='$edad', 
                plan_base='$plan_base', 
                paquete='$paquete', 
                duracion='$duracion',
                costo='$costo' 
            WHERE id='$id'";

    if ($conexion->query($sql) === TRUE) {
        header("Location: usuarios.php"); // Redirige a la lista de usuarios
        exit();
    } else {
        echo "Error al modificar usuario: " . $conexion->error;
    }
}

// Obtener datos del usuario si se pasó un ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit;
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Modificar Usuario</h2>

        <form action="modificar.php" method="POST">
            <input type="hidden" name="id" value="<?= $usuario['id']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($usuario['nombre']); ?>" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="<?= htmlspecialchars($usuario['correo']); ?>" required>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" value="<?= htmlspecialchars($usuario['edad']); ?>" required>

            <label for="plan_base">Plan Base:</label>
            <select name="plan_base" id="plan_base">
                <option value="Basico" <?= $usuario['plan_base'] == 'Basico' ? 'selected' : ''; ?>>Básico</option>
                <option value="Estandar" <?= $usuario['plan_base'] == 'Estandar' ? 'selected' : ''; ?>>Estándar</option>
                <option value="Premium" <?= $usuario['plan_base'] == 'Premium' ? 'selected' : ''; ?>>Premium</option>
            </select>

            <label for="paquete">Paquete Adicional:</label>
            <select name="paquete" id="paquete">
                <option value="Ninguno" <?= $usuario['paquete'] == 'Ninguno' ? 'selected' : ''; ?>>Ninguno</option>
                <option value="Deporte" <?= $usuario['paquete'] == 'Deporte' ? 'selected' : ''; ?>>Deporte</option>
                <option value="Cine" <?= $usuario['paquete'] == 'Cine' ? 'selected' : ''; ?>>Cine</option>
                <option value="Infantil" <?= $usuario['paquete'] == 'Infantil' ? 'selected' : ''; ?>>Infantil</option>
            </select>

            <label for="duracion">Duración:</label>
            <select name="duracion" id="duracion">
                <option value="Mensual" <?= $usuario['duracion'] == 'Mensual' ? 'selected' : ''; ?>>Mensual</option>
                <option value="Anual" <?= $usuario['duracion'] == 'Anual' ? 'selected' : ''; ?>>Anual</option>
            </select>

            <button type="submit">Modificar</button>
        </form>
    </div>
</body>
</html>
