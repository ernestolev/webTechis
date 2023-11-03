<?php
include '../Conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u_id = $_POST['u_id'];
    $estado_pedido = $_POST['estado_pedido'];
    $entrega = $_POST['entrega'];
    $monto_pedido = $_POST['monto_pedido'];
    $id_delivery = $_POST['id_delivery'];

    // Realiza una consulta SQL para insertar el pedido en la tabla 'pedido'
    $sql = "INSERT INTO pedido (u_id, estado_pedido, entrega, monto_pedido, id_delivery) VALUES ('$u_id', '$estado_pedido', '$entrega', '$monto_pedido', '$id_delivery')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Pedido confirmado con éxito.";
    } else {
        echo "Error al confirmar el pedido: " . mysqli_error($conn);
    }
} else {
    echo "Acceso no autorizado.";
}
?>
