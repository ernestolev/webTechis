<?php
$servername = "localhost"; // Nombre del servidor de la base de datos (generalmente localhost)
$username = "root"; // Tu nombre de usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
$database = "bdtechis"; // El nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>