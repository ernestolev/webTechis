<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    include '../Conexion/conexion.php';

    $id = $_POST["id"];
    
    // Consulta SQL para eliminar el producto por ID
    $sql = "DELETE FROM productos WHERE P_id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Producto eliminado con éxito";
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
    
}
?>
