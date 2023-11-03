<?php
include '../Conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    // Realiza una consulta para actualizar la cantidad en la base de datos
    $updateQuery = "UPDATE carrito SET P_cantidad = $newQuantity WHERE P_id = $productId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Cantidad actualizada con éxito";
    } else {
        echo "Error al actualizar la cantidad: " . mysqli_error($conn); // Muestra el mensaje de error de MySQL para depuración
    }
} else {
    echo "Solicitud no válida";
}
?>
