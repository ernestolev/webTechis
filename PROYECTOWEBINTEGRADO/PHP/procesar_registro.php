<?php
include '../Conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $correo = $_POST['correo'];
    $distrito = $_POST['distrito'];
    $pass = $_POST['password'];

    $rol = "usuario";

    $sql = "INSERT INTO usuarios (id, nombre, apellidos, correo, distrito, pass, rol) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssss", $dni, $nombre, $apellidos, $correo, $distrito, $pass, $rol);

        if ($stmt->execute()) {
            echo '<script>
                alert("Registro exitoso. Inicia sesión.");
                window.location.href = "../HTML/FORMS-LOGIN-REGISTRO/login.php";
              </script>';
        } else {
            echo "Error al registrar. Por favor, inténtalo de nuevo.";
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta.";
    }
} else {
    echo "Acceso no autorizado.";
}

?>