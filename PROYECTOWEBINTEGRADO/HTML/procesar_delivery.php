<?php
include '../Conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pedido = $_POST['id_pedido'];
    $distrito = $_POST['distrito'];
    $direccion = $_POST['direccion'];
    $costo_envio = $_POST['costo_envio'];

    // Realiza una consulta SQL para insertar la información de entrega en la tabla 'delivery'
    $sql = "INSERT INTO delivery (id_pedido, distrito, direccion, costo_envio) VALUES ('$id_pedido', '$distrito', '$direccion', '$costo_envio')";

    if (mysqli_query($conn, $sql)) {
        echo "Método de entrega confirmado con éxito.";
    } else {
        echo "Error al confirmar el método de entrega: " . mysqli_error($conn);
    }
} else {
    echo "Acceso no autorizado.";
}
?>
