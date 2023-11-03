<?php
include '../Conexion/conexion.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../FORMS-LOGIN-REGISTRO/login.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recopila los datos del formulario
    $userId = $_SESSION['user'];
    $idCarrito = $_SESSION['user'];
    $estadoPedido = 'falta pagar';
    $entrega = $_POST['entrega'];
    $montoPedido = $_POST['precio'];  // Asegúrate de que esta variable esté disponible
    $distritoEnvio = $_POST['distrito']; // Accede al campo de distrito
    $direccionEnvio = $_POST['direccion']; // Accede al campo de dirección

    // Consulta para obtener los elementos del carrito y sus descripciones
    $sqlCarrito = "SELECT C.P_id, C.P_cantidad, P.P_stock, P.P_nom
                   FROM carrito C
                   INNER JOIN productos P ON C.P_id = P.P_id
                   WHERE C.U_id = '$userId'";

    $resultCarrito = mysqli_query($conn, $sqlCarrito);

    if (!$resultCarrito) {
        echo "Error al obtener los elementos del carrito: " . mysqli_error($conn);
        exit;
    }

    $itemsconcatendos = array(); // Para almacenar las descripciones

    while ($row = mysqli_fetch_assoc($resultCarrito)) {
        $descripcion = " (" . $row['P_stock'] . ") de ". $row['P_nom'] ;
        $itemsconcatendos[] = $descripcion;
    }

    $descrip = implode(', ', $itemsconcatendos); // Convierte el array en una cadena separada por comas

    // Realiza la inserción en la tabla "pedido"
    $sql = "INSERT INTO pedido (u_id, id_carrito, estado_pedido, entrega, monto_pedido, distrito_envio, direccion_envio, descripcion)
            VALUES ('$userId', '$idCarrito', '$estadoPedido', '$entrega', '$montoPedido', '$distritoEnvio', '$direccionEnvio', '$descrip')";

    if (mysqli_query($conn, $sql)) {
        // La inserción fue exitosa
        header("Location: pagar.php"); // Redirige a una página de confirmación
    } else {
        // Ocurrió un error en la inserción
        echo "Error al procesar el pedido: " . mysqli_error($conn);
    }
}

?>
