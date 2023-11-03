<?php
session_start();
include '../../Conexion/conexion.php';

if (!isset($_SESSION['user'])) {
    echo "Debes iniciar sesión para agregar productos al carrito.";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user'];
        $productId = $_POST['product_id'];

        $checkQuery = "SELECT P_cantidad FROM carrito WHERE U_id = '$userId' AND P_id = '$productId'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if ($checkResult) {
            if (mysqli_num_rows($checkResult) > 0) {
                $row = mysqli_fetch_assoc($checkResult);
                $cantidad = $row['P_cantidad'] + 1;
                $updateQuery = "UPDATE carrito SET P_cantidad = '$cantidad' WHERE U_id = '$userId' AND P_id = '$productId'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                    echo "Cantidad actualizada en el carrito correctamente.";
                } else {
                    echo "Error al actualizar la cantidad del producto en el carrito en la base de datos.";
                }
            } else {
                $cantidad = 1;
                $insertQuery = "INSERT INTO carrito (Carrito_id, U_id, P_id, P_cantidad) VALUES ('$userId','$userId', '$productId', '$cantidad')";
                $insertResult = mysqli_query($conn, $insertQuery);

                if ($insertResult) {
                    echo "Producto agregado al carrito correctamente.";
                } else {
                    echo "Error al agregar el producto al carrito en la base de datos.";
                }
            }
        } else {
            echo "Error al verificar el producto en el carrito en la base de datos.";
        }
    } else {
        echo "No se proporcionó un ID de usuario válido en la sesión.";
    }
} else {
    echo "No se proporcionó un ID de producto válido.";
}
?>
