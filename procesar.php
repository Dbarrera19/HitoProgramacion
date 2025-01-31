<?php
// Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "curso";
$base_datos = "hito1";

// Se establece la conexión con la base de datos
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Se verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error); // Si hay un error, se detiene la ejecución
}

// Se verifica si el formulario fue enviado mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Se obtienen y limpian los datos enviados por el formulario para evitar inyecciones SQL
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $correo = $conexion->real_escape_string($_POST["correo"]);
    $edad = (int) $_POST["edad"]; // Se convierte la edad a un número entero
    $plan_base = $conexion->real_escape_string($_POST["plan_base"]);
    $paquete = $conexion->real_escape_string($_POST["paquete"]);
    $duracion = $conexion->real_escape_string($_POST["duracion"]);

    // Se validan los campos para asegurarse de que no están vacíos
    if (empty($nombre) || empty($correo) || empty($edad) || empty($plan_base) || empty($paquete) || empty($duracion)) {
        echo "Todos los campos son obligatorios.";
        exit; // Se detiene la ejecución si falta algún dato
    }

    // Se calcula el costo base según el plan seleccionado
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

    // Se suma el costo adicional si el usuario elige un paquete extra
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

    // Si la suscripción es anual, el costo se multiplica por 12 meses
    if ($duracion == 'Anual') {
        $costo *= 12;
    }

    // Se verifica si el correo ya está registrado en la base de datos
    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        // Si el correo ya existe, se muestra un mensaje de error
        echo "El correo electrónico ya está registrado. <a href='../index.php'>Volver</a>";
    } else {
        // Se inserta el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, correo, edad, plan_base, paquete, duracion, costo) 
                VALUES ('$nombre', '$correo', '$edad', '$plan_base', '$paquete', '$duracion', '$costo')";

        // Se ejecuta la consulta y se verifica si fue exitosa
        if ($conexion->query($sql) === TRUE) {
            header("Location: ../index.php");  // Redirige a la página de inicio si el registro fue exitoso
            exit();
        } else {
            echo "Error al registrar usuario: " . $conexion->error; // Se muestra un mensaje si hubo un error
        }
    }
} else {
    echo "No se ha recibido el formulario correctamente."; // Mensaje si el formulario no fue enviado correctamente
}

// Se cierra la conexión a la base de datos
$conexion->close();
?>
