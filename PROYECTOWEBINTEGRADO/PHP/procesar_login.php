<?php
include '../Conexion/conexion.php';

$user = $_POST['dni_correo'];
$password = $_POST['password'];

if (is_numeric($user)) {
    $user = strval($user);
}

$sql = "SELECT id, nombre, rol FROM usuarios WHERE (id = ? OR correo = ?) AND pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user, $user, $password);

if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $nombreUsuario = $row['nombre']; // Obtén el nombre del usuario
        $rolUsuario = $row['rol']; // Obtén el rol del usuario

        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['nombre_usuario'] = $nombreUsuario; // Establece la variable de sesión
        $_SESSION['rol'] = $rolUsuario; // Establece la variable de sesión para el rol

        echo '<script>
                alert("Inicio de sesión exitoso. Bienvenido, ' . $nombreUsuario . '.");
                window.location.href = "../HTML/indexconsesion.php";
              </script>';
    } else {
        echo '<script>
                alert("Inicio de sesión fallido. Verifica tus credenciales.");
                window.location.href = "pagina_de_inicio_de_sesion.php";
              </script>';
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
