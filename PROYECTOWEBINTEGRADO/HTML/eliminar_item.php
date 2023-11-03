<?php
include '../Conexion/conexion.php';
session_start();

if (!isset($_SESSION['user'])) {
    // Maneja el caso en el que el usuario no ha iniciado sesión
    echo "No se pudo eliminar el producto: Usuario no autenticado.";
    exit;
}

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    
    // Asegúrate de que el producto pertenece al usuario actual
    $userId = $_SESSION['user'];
    $query = "DELETE FROM carrito WHERE U_id = '$userId' AND P_id = '$productId'";
    
    if (mysqli_query($conn, $query)) {
        echo "Producto eliminado con éxito.";
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
} else {
    echo "No se proporcionó un ID de producto válido.";
}
?>
