<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    include '../Conexion/conexion.php';

    $id = $_POST["id"];
    
    // Consulta SQL para eliminar el usuario por ID
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Usuario eliminado con éxito";
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>