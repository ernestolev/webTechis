<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["rol"])) {
    include '../Conexion/conexion.php';

    $id = $_POST["id"];
    $rol = $_POST["rol"];
    
    // Consulta SQL para actualizar el rol del usuario
    $sql = "UPDATE usuarios SET rol = '$rol' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "Error al actualizar el rol: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>